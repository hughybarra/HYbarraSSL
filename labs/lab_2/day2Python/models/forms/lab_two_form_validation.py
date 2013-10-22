#!/usr/bin/python
__author__ = 'Hugh'

'''
Doc Title  Lab_two_form_validation.py
Author: Hugh Ybarra
Description: Validates all fields of the lab 2 form
form method: post
example:
first
last
date
number
currency
url
checkbox
radios

validates form and returns a json encoded doc with true or false
if the form is valid or invalid
'''


class Validate_Lab_Two_Form:
    def __init__(self):
        self.base_path = "/Applications/MAMP/htdocs/SSL/day2Python/models/forms"

    def validate_form(self, my_url):
        #document imports
        import re
        import json
        #=======================================
        #=======================================
        #DELETE THIS WHEN DONE TESTING
        import models.view
        from models.view import View
        view_model = View()
        view_model.print_header()
        # DELETE THIS WHEN DONE TESTING
        #=======================================
        #=======================================

        #declaring validator variables
        first_name  = ""
        last_name   = ""
        email       = ""
        date        = ""
        number      = ""
        currency    = ""
        url         = ""
        select      = ""
        checkbox    = ""
        sex         = ""
        user_data   = ""
        sex         = ""
        terms_agree = ""
        mail_list   = ""
        response    = {}
        is_valid    = True
        #declaring regex variables
        email_regex = "[^@]+@[^@]+\.[^@]+"
        #look into finding a better regex for this email
        #it works for the assignmetn but!
        #i am probably going to have to validate their email address by emailing a link to them then have them click on it
        # so a basic validator works for now.
        # find better email regex !

        password_regex  = "^[a-zA-Z0-9]{8,15}"
        string_regex    = "^[a-zA-Z]{3,}"
        number_regex    = "^[0-9]"
        # url_regex       = "^[a-zA-Z0-9\-\.]+\.(com|org|net|mil|edu|COM|ORG|NET|MIL|EDU)$"
        url_regex       = "^http\://[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(/\S*)?$"

        # check for the first name
        #===================================================
        if my_url.getvalue("first_name"):
            #regex validation
            match_object = re.search(string_regex, my_url.getvalue("first_name"))
            # match_object = re.search(string_regex, my_url.getvalue("firstName"))
            if match_object:
                    first_name = my_url.getvalue("first_name")
            else:
                first_name = False
        else:
            first_name = False

        # check for the last name
        #===================================================
        if my_url.getvalue("last_name"):
            #regex validation
            match_object = re.search(string_regex, my_url.getvalue("last_name"))

            if match_object:
                last_name = my_url.getvalue("last_name")
            else:
                last_name = False
        else:
            last_name = False
        # check for the date
        #===================================================
        if my_url.getvalue("form_date"):
            date = my_url.getvalue("form_date")
        else:
            date = False
        # check for Number
        #===================================================
        if my_url.getvalue("form_number"):
            #regex validation
            match_object = re.match(number_regex, my_url.getvalue("form_number"))
            if match_object:
                number = my_url.getvalue("form_number")
            else:
                number = False
        else:
            number = False
        # check for currency
        #===================================================
        if my_url.getvalue("form_currency"):
            #regex validation
            match_object = re.search(number_regex, my_url.getvalue("form_currency"))
            if match_object:
                currency = my_url.getvalue("form_currency")
            else:
                currency = False
        else:
            currency = False
        # check for url
        #===================================================
        if my_url.getvalue("form_url"):
            #regex validation
            match_object = re.search(url_regex, my_url.getvalue("form_url"))
            if match_object:
                url = my_url.getvalue("form_url")
            else:
                url = False
        else:
            url = False
        # check for select
        #===================================================
        if my_url.getvalue("form_select"):
            select = my_url.getvalue("form_select")
        else:
            select = False
        #check for sex
        #===================================================
        if my_url.getvalue("sex"):
            sex = my_url.getvalue("sex")
        else:
            sex = False
        #check for agree
        #===================================================
        if my_url.getvalue("agree"):
            terms_agree = my_url.getvalue("agree")
        else:
            terms_agree = False
        #check for mailing list
        #===================================================
        if my_url.getvalue("form_mailing_list"):
            mail_list = my_url.getvalue("agree")
        else:
            mail_list = False

        #end of field validation
        #====================================================
        #====================================================
        #====================================================
        # print first_name, "</br><hr>", \
        # last_name, "</br><hr>", \
        # date, "</br><hr>",\
        # number, "</br><hr>",\
        # currency, "</br><hr>",\
        # url,"</br><hr>",\
        # select,"</br><hr>",\
        # sex, "</br><hr>"



        if first_name and last_name and url and date and number and currency and select and sex:
            form_valid = True
        else:
            form_valid = False

        form_object = {
            "success":form_valid,
            "first_name":first_name,
            "last_name":last_name,
            "date":date,
            "number":number,
            "currency": currency,
            "url":url,
            "select":select,
            "sex":sex,
            "terms_agree":terms_agree
        }


        if form_valid:
            print json.dumps(form_object)
        else:
            print json.dumps(form_object)