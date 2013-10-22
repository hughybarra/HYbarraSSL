#!/usr/bin/python
__author__ = 'Hugh'

'''
'''

class validate_login:
    def __init__(self):
        self.base_path = "/Applications/MAMP/htdocs/SSL/day2Python/models/forms"

    def v_login(self, form_data):
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
        user_name   = ""
        password    = ""
        is_valid    = True
        response    = {}

        #declaring regex variables
        email_regex = "[^@]+@[^@]+\.[^@]+"
        password_regex  = "^[a-zA-Z0-9]{8,15}"

        #check for user name
        #===================================================
        if form_data.getvalue("user_name"):
            #regex validation
            match_object = re.search(email_regex, form_data.getvalue("user_name"))

            if match_object:
                user_name = form_data.getvalue("user_name")
            else:
                user_name = False
        else:
            user_name = False
        #check for password
        #===================================================
        if form_data.getvalue("password"):
            #regex validation
            match_object = re.search(password_regex, form_data.getvalue("password"))

            if match_object:
                password = form_data.getvalue('password')
            else:
                pasword = False
        else:
            password = False

        if user_name and password:
            is_valid = True
        else:
            is_valid = False

        response = {
            "success":is_valid
        }

        if is_valid:
            print json.dumps(response)
        else:
            print json.dumps(response)
