#!/usr/bin/env python
from datetime import datetime,date,time
from time import sleep
from xml.etree.ElementTree import Element, SubElement, Comment, tostring
#import serial
import time
import xlrd
from xlrd import xldate
import re
import sys
#import statistics
from xmlConversion import generateXMLHeader, generateDataSetMultipleParts, writeToFile,writeToFile1
from xmlConversion import generateXMLDatafastamb,generateXMLDatafast,generateXMLDatalongamb,generateXMLDatalong, generateXMLData3,generateXMLData3a,generateXMLData4,generateXMLData4a,generateXMLData5a,generateXMLData5,generateXMLData4s, generateXMLData5s, generateXMLDataStrips
#from flask import Flask, render_template
#from flask_sqlalchemy import SQLAlchemy
#from sqlalchemy import create_engine, MetaData, Table, and_
#from sqlalchemy.sql import select


#QC5
def xml_from_excel5(excel_file):
	wb = xlrd.open_workbook(excel_file)
	sh = wb.sheet_by_index(0)
	#user = sh.cell(0,1).value
	user = sys.argv[3]
	#chamber=sh.cell(10,1).value
#	chamber=sys.argv[2]
#	Run=sys.argv[3]
	location=sys.argv[2]
	Start=sys.argv[5]
	Stop=sys.argv[6]
	Date=str(Start[0:10])
	comment=sys.argv[4]
#	Elog=sys.argv[7]
#	File=sys.argv[8]
#	Comment=sys.argv[9]
	Run = sh.cell(0,1).value
	root = generateXMLHeader("GEM_VFAT_STRIP_MASKING","GEM VFAT STRIP MASKING", "VFAT STRIP MASKING",str(Run),str(Start),str(Stop),str(comment),str(location),str(user))
	dataSet = generateDataSetMultipleParts(root,comment,"1")
	for row in range(2,sh.nrows):
                sector= sh.row_values(row)[0]
                depth= sh.row_values(row)[1]
                position= sh.row_values(row)[2]
                ch= sh.row_values(row)[3]
                hot_ch= sh.row_values(row)[4]
                fit_failed= sh.row_values(row)[5]
                dead_ch= sh.row_values(row)[6]
                high_noise= sh.row_values(row)[7]
                high_eff= sh.row_values(row)[8]
		generateXMLDataStrips(dataSet,str(sector),str(depth),str(position), str(ch), str(hot_ch),str(fit_failed),str(dead_ch),str(high_noise),str(high_eff))
		writeToFile(fileName, tostring(root))
if __name__ =="__main__":	
	#fname=raw_input("Enter excel data file name:")
	fname = sys.argv[1]
	fileName=fname+".xml"
#	datafile=fname+"_Data.xml"
#	testfile=fname+"_summry.xml"
	xml_from_excel5(fname)
