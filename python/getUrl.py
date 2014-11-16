#!/usr/bin/env python
# -*- coding: utf-8 -*-
# @Author: caicai
# @Date:   2013-11-20 23:55:43
# @Email:  caizhenghai@gmail.com
# @Last modified by:   forecho
# @Last modified time: 2013-11-21 20:42:41

import urllib2
import re
import MySQLdb
import thread
import time
#创建锁，用于访问数据库
lock = thread.allocate_lock()
#抓取函数
def fetch(id=1,debug=False):
    urlbase = 'http://i.youku.com/u/UMTE0NDEzOTky/videos/'
    url = urlbase + 'order_1_view_1_page_' + str(id) + '/'
    res = urllib2.urlopen(url).read()
    abstarct = re.compile(r'<ul class="v".*?</ul>',re.DOTALL).findall(res)
    
    vid_list = []
    for i in range(0,len(abstarct)):
        title = re.compile(r'title="(.*?)"',re.DOTALL).findall(abstarct[i])
        href = re.compile(r'href="(.*?)"',re.DOTALL).findall(abstarct[i])
        date = re.compile(r'<span>(.*?)</span>',re.DOTALL).findall(abstarct[i])
        if debug == True:
            print title[0]+href[0]+date[0]
        vid = {
            'title' : title[0],
            'href'  : href[0],
            'date'  : date[0]
        }
        vid_list.append(vid)
    #print thread.get_ident()    
    return vid_list
#插入数据库
def insert_db(page):
    global lock
    #执行抓取函数
    vid_date = fetch(page,False)
    sql = "insert into ykgame (title,href,date) values (%s,%s,%s)"
    #插入数据，一页20条
    for i in range(0,len(vid_date)):
        param = (vid_date[i]['title'],vid_date[i]['href'],
                    vid_date[i]['date'])
        lock.acquire() #创建锁
        cursor.execute(sql,param)
        conn.commit()
        lock.release() #释放锁
                
if __name__ == "__main__":
    #连接数据库
    conn = MySQLdb.connect(host="localhost",user="root",
            passwd="",db="bizui",charset="utf8")
    cursor = conn.cursor()
    conn.select_db('bizui')
    #创建表
    sql = "CREATE TABLE IF NOT EXISTS \
        ykgame(id int PRIMARY KEY AUTO_INCREMENT, title varchar(50), \
        href varchar(50), date varchar(25))"        
    cursor.execute(sql)
    #插入数据库
    for i in range(1,10):
        thread.start_new_thread(insert_db,(i,))
        print '采集中...'
    time.sleep(3)
    #关闭数据库
    cursor.close()
    conn.close()