import requests
import csv

filename = "celebrity_info1.csv"

with open(filename, encoding="utf-8") as csvfile:
    readCSV = csv.reader(csvfile, delimiter=',')
    for row in readCSV:
        F = open(row[4]+ ".jpg", 'wb')
        F.write(requests.get(row[2]).content)
        F.close()
