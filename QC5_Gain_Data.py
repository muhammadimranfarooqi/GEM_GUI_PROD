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
from xmlConversion import generateXMLDatafastamb,generateXMLDatafast,generateXMLDatalongamb,generateXMLDatalong, generateXMLData3,generateXMLData3a,generateXMLData4,generateXMLData4a,generateXMLData5a,generateXMLData5,generateXMLData4s, generateXMLData5s
#from flask import Flask, render_template
#from flask_sqlalchemy import SQLAlchemy
#from sqlalchemy import create_engine, MetaData, Table, and_
#from sqlalchemy.sql import select


#QC5
def xml_from_excel5(excel_file):
	wb = xlrd.open_workbook(excel_file)
	sh = wb.sheet_by_index(0)
	#user = sh.cell(0,1).value
	user = sys.argv[5]
	#chamber=sh.cell(10,1).value
	chamber=sys.argv[2]
	Run=sys.argv[3]
	location=sys.argv[4]
	Start=sys.argv[7]
	Stop=sys.argv[8]
	Date=str(Start[0:10])
	comment=sys.argv[6]
	Elog=sys.argv[9]
	File=sys.argv[10]
	Comment=sys.argv[11]
	user_name = sh.cell(1,1).value
	amp = sh.cell(4,1).value
	coa = sh.cell(5,1).value
	fine = sh.cell(6,1).value
	itime = sh.cell(8,1).value
	dtime = sh.cell(7,1).value
	disc = sh.cell(27,1).value
	thrs = sh.cell(28,1).value
	walk = sh.cell(29,1).value
	width = sh.cell(30,1).value
	scal = sh.cell(40,1).value
	daq = sh.cell(41,1).value
	pico = sh.cell(33,1).value
	#tred = sh.cell(34,1).value
	#tblack = sh.cell(35,1).value
	#tgreen = sh.cell(36,1).value
	source = sh.cell(44,1).value
	hvlt = sh.cell(45,1).value
	current = sh.cell(46,1).value
	activity_bq = sh.cell(47,1).value
	filter_status = sh.cell(48,1).value
	collimator_status = sh.cell(49,1).value
	nbpri = sh.cell(23,5).value
	eta = sh.cell(12,1).value
	gas = sh.cell(13,1).value
	gfac = sh.cell(14,1).value
	flow = sh.cell(15,1).value
	req = sh.cell(16,1).value
	divi = sh.cell(17,1).value
	avtemp = sh.cell(47,5).value
	error_temp = sh.cell(48,5).value
	amb = sh.cell(49,5).value
	error_amb = sh.cell(50,5).value
	expo1 = sh.cell(51,5).value
	expo2= sh.cell(52,5).value
	p5p0 = sh.cell(47,8).value
	p5t0 = sh.cell(48,8).value
	root = generateXMLHeader("QC5_EFF_GAIN_CONFIG","GEM Chamber QC5 Effective Gain Config", str(location) + " GEM Chamber QC5 Effective Gain",Run,Start,Stop,comment,location,user)
	dataSet = generateDataSet(root,Comment,"1","GEM Chamber",chamber)
	generateXMLData5a(dataSet,str(user_name),str(amp),str(coa), str(fine), str(itime),str(dtime),str(disc),str(thrs),str(walk),str(width),str(scal),str(daq),str(pico),str(source),str(hvlt),str(current),str(nbpri),str(eta),str(gas),str(gfac),str(flow),str(req),str(divi),str(activity_bq),str(filter_status),str(collimator_status))
	writeToFile(fileName, tostring(root))
	
	root = generateXMLHeader("QC5_EFF_GAIN_DATA","GEM Chamber QC5 Effective Gain Data",str(location) + " GEM Chamber QC5 Effective Gain",Run,Start,Stop,comment,location,user)
	dataSet = generateDataSet(root,Comment,"1","GEM Chamber",chamber)
	#for row in range(5,21):
	for row in range(29,45):
		#test_time= sh.row_values(row-24)[7]
		test_time = xlrd.xldate_as_tuple(sh.row_values(row-24)[7], wb.datemode)
 		test_time=str(test_time).replace(",",":")
                test_time = str(test_time).replace(")","")
                test_time = str(test_time).replace("("," ")
              	pressure= sh.row_values(row-24)[8]
		temp= sh.row_values(row-24)[9]
		vmon= sh.row_values(row)[5]
		imon= sh.row_values(row)[4]
       		vdrift= sh.row_values(row)[6]
		rate= sh.row_values(row)[7]
		rate_error= sh.row_values(row)[8]
		current= sh.row_values(row)[9]
		current_error= sh.row_values(row)[10]
		gain= sh.row_values(row)[11]
		gain_error= sh.row_values(row)[12]
		generateXMLData5(dataSet,Date + str(test_time[9:]),str(temp),str(pressure), str(imon), str(vmon),str(vdrift),str(rate),str(rate_error),str(current),str(current_error),str(gain),str(gain_error))
		writeToFile(datafile, tostring(root))
	root = generateXMLHeader("QC5_EFF_GAIN_SUMRY","GEM Chamber QC5 Effective Gain Summary",str(location) + " GEM Chamber QC5 Effective Gain",Run,Start,Stop,comment,location,user)
	dataSet = generateDataSet(root,Comment,"1","GEM Chamber",chamber)
	generateXMLData5s(dataSet,str(Start),str(avtemp), str(amb),str(expo1),str(expo2),str(File),str(Elog),str(Comment),str(error_temp),str(error_amb),str(p5p0),str(p5t0))
	writeToFile(testfile, tostring(root))
if __name__ =="__main__":	
	#fname=raw_input("Enter excel data file name:")
	fname = sys.argv[1]
	fileName=fname+".xml"
	datafile=fname+"_Data.xml"
	testfile=fname+"_summry.xml"
	xml_from_excel5(fname)
