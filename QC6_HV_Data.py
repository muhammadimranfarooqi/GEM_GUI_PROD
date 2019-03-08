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
from xmlConversion import generateXMLHeader, generateDataSet, writeToFile,writeToFile1
from xmlConversion import generateXMLDatafastamb,generateXMLDatafast,generateXMLDatalongamb,generateXMLDatalong, generateXMLData3,generateXMLData3a,generateXMLData4,generateXMLData4a,generateXMLData5a,generateXMLData5,generateXMLData4s,generateXMLData6a,generateXMLData6b,generateXMLData6c
#from flask import Flask, render_template
#from flask_sqlalchemy import SQLAlchemy
#from sqlalchemy import create_engine, MetaData, Table, and_
#from sqlalchemy.sql import select
#import cx_Oracle
#import json
def xml_from_excel4(excel_file):
	wb = xlrd.open_workbook(excel_file)
	sh = wb.sheet_by_index(0)
	req = sh.cell(1,33).value
#	pre = sh.cell(5,16).value
#	amp = sh.cell(8,16).value
#	coa = sh.cell(9,16).value
#	fine = sh.cell(10,16).value
#	itime = sh.cell(12,16).value
#	dtime = sh.cell(13,16).value
#	disc = sh.cell(16,16).value
#	thrs = sh.cell(17,16).value
#	scal = sh.cell(20,16).value
#	daq = sh.cell(21,16).value
	Start=sys.argv[7]
	Stop=sys.argv[8]
	chamber=sys.argv[2]
	Date=str(Start[0:10])
	location=sys.argv[4]
	#user=sh.cell(1,7).value
	user=sys.argv[5]
	comment=sys.argv[6]
	Comment=sys.argv[11]
	Run=sys.argv[3]
	root = generateXMLHeader("QC6_HVTEST_CONFIG","GEM Chamber QC6 HVTEST Config",str(location) + " GEM QC6 HV Test",Run,Start,Stop,comment,location,user)
	dataSet = generateDataSet(root,Comment,"1","GEM Chamber",chamber)
	generateXMLData6a(dataSet,str(req))
	writeToFile(fileName, tostring(root))
	root = generateXMLHeader("QC6_HVTEST_DATA","GEM Chamber QC6 HVTEST Data",str(location) + " GEM QC6 HV Test",Run,Start,Stop,comment,location,user)
	dataSet = generateDataSet(root,Comment,"1","GEM Chamber",chamber)
	for row in range(2, sh.nrows):
		if sh.row_values(row)[0]=='':
			break
		vmon_equ_vlt = sh.row_values(row)[0]
		imon_equ_ua= sh.row_values(row)[1]
		vmon_g3b_vlt =sh.row_values(row)[3]
		imon_g3b_ua = sh.row_values(row)[4]
		vmon_g3t_vlt =sh.row_values(row)[6]
		imon_g3t_ua=sh.row_values(row)[7]
		vmon_g2b_vlt =sh.row_values(row)[9]
                imon_g2b_ua = sh.row_values(row)[10]
                vmon_g2t_vlt =sh.row_values(row)[12]
                imon_g2t_ua=sh.row_values(row)[13]
                vmon_g1b_vlt =sh.row_values(row)[15]
                imon_g1b_ua = sh.row_values(row)[16]
                vmon_g1t_vlt =sh.row_values(row)[18]
                imon_g1t_ua=sh.row_values(row)[19]
               	vmon_drift_vlt = sh.row_values(row)[21]
                imon_drift_ua= sh.row_values(row)[22]
		generateXMLData6b(dataSet,str(vmon_equ_vlt), str(imon_equ_ua),str(vmon_g3b_vlt),str(imon_g3b_ua), str(vmon_g3t_vlt), str(imon_g3t_ua),str(vmon_g2b_vlt),str(imon_g2b_ua),str(vmon_g2t_vlt),str(imon_g2t_ua),str(vmon_g1b_vlt),str(imon_g1b_ua),str(vmon_g1t_vlt),str(imon_g1t_ua),str(vmon_drift_vlt),str(imon_drift_ua))
		writeToFile(datafile, tostring(root))
		
	test_date=Start
	Filename= sys.argv[10]
	Elog=sys.argv[9]
	Comment=sys.argv[11]
	root = generateXMLHeader("QC6_HVTEST_SUMRY","GEM Chamber QC6 HVTEST Summary",str(location) + " GEM QC6 HV Test",Run,Start,Stop,comment,location,user)
	dataSet = generateDataSet(root,Comment,"1","GEM Chamber",chamber)
	generateXMLData6c(dataSet,test_date,str(Filename),str(Elog),str(Comment))
	writeToFile(testfile, tostring(root))

#_result = {}
#_result['XLS_FILE'] = fileName
#_result['var'] = testfile

#print json.dumps(_result)

if __name__ =="__main__":	
	#fname=raw_input("Enter excel data file name:")
	fname = sys.argv[1]
	fileName=fname+".xml"
	datafile=fname+"_Data.xml"
	testfile=fname+"_summry.xml"
	xml_from_excel4(fname)
	print 1
	print 2
