#!/usr/bin/env python
# -*- coding: utf-8 -*-
# @Author: forecho
# @Date:   2013-11-21 00:30:33
# @Email:  email@example.com
# @Last modified by:   forecho
# @Last modified time: 2013-11-21 23:28:15

import re
import urllib2
import MySQLdb
import thread
import time

#创建锁，用于访问数据库
lock = thread.allocate_lock()

def fetch(id=1,debug=True):
    urlbase = 'http://i.youku.com/u/UNTMxOTkwNjA0/videos/'
    url = urlbase + 'order_1_view_1_page_' + str(id) + '/'
    res = urllib2.urlopen(url).read()
    abstarct = re.compile(r'<ul class="v".*?</ul>',re.DOTALL).findall(res)
    
    vid_list = []
    for i in range(0,len(abstarct)):
        title = re.compile(r'title="(.*?)"',re.DOTALL).findall(abstarct[i])
        href = re.compile(r'href="(.*?)"',re.DOTALL).findall(abstarct[i])
        src = re.compile(r'src="(.*?)"',re.DOTALL).findall(abstarct[i])
        date = re.compile(r'<span>(.*?)</span>',re.DOTALL).findall(abstarct[i])

        # resv = urllib2.urlopen(href[0]).read()
        # video_url = re.compile(r'id="link2" value="(.*?)"',re.DOTALL).findall(resv)

        if debug == True:
            print title[0]+href[0]+date[0]+src[0]
        
        vid = {
            'title' : title[0],
            'href'  : href[0],
            'date'  : date[0],
            'src'   : src[0],
            'src'   : src[0],
            # 'video_url'   : video_url[0]
        }
        vid_list.append(vid)
    # print thread.get_ident()
    return vid_list

#插入数据库
def insert_db(page):
    global lock
    #执行抓取函数
    vid_date = fetch(page,False)
    sql = "insert into bz_posts (bp_title,bp_url,bp_create_time,bp_img_url,bp_video_url) values (%s,%s,%s,%s,%s)"
    #插入数据，一页20条
    date = time.time()

    for i in range(0,len(vid_date)):
        param = (vid_date[i]['title'],vid_date[i]['href'],date,vid_date[i]['src'],'sss')
        lock.acquire() #创建锁
        cursor.execute(sql,param)
        conn.commit()
        lock.release() #释放锁


if __name__ == '__main__':
    print '采集开始。。。。'
    #连接数据库
    conn = MySQLdb.connect(host="localhost",user="root",
            passwd="",db="bizui",charset="utf8")
    cursor = conn.cursor()
    conn.select_db('bizui')
    #插入数据库
    for i in range(1,10):
        thread.start_new_thread(insert_db,(i,))
    time.sleep(3)
    #关闭数据库
    cursor.close()
    conn.close()
    print '采集结束。。。'