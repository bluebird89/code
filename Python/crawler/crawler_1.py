import requests
from lxml import etree
import pandas as pd
import time
import random
from tqdm import tqdm

name, score, comment = [], [], []


def danye_crawl(page):
    url = 'https://movie.douban.com/subject/6390825/comments?start=%s&limit=20&sort=new_score&status=P&percent_type=' % (
            page * 20)

    response = etree.HTML(requests.get(url).content.decode('utf-8'))

    print('\n', '第%s页评论爬取成功' % (page)) if requests.get(
        url).status_code == 200 else print('\n', '第%s页爬取失败'(page))

    for i in range(1, 21):
        name.append(response.xpath(
            '//*[@id="comments"]/div[%s]/div[2]/h3/span[2]/a' % (i))[0].text)

        score.append(response.xpath(
            '//*[@id="comments"]/div[%s]/div[2]/h3/span[2]/span[2]' % (i))[0].attrib['class'][7])

        comment.append(response.xpath(
            '//*[@id="comments"]/div[%s]/div[2]/p' % (i))[0].text)


for i in tqdm(range(11)):
    danye_crawl(i)
    time.sleep(random.uniform(6, 9))

res = pd.DataFrame({'name': name, 'score': score, 'comment': comment}, columns=[
    'name', 'score', 'comment'])
res.to_csv("static/豆瓣.csv")
