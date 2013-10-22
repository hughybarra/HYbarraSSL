#!/usr/bin/python
__author__ = 'Hugh'


class Validate_Form:
    #initialize Validate
    def __init__(self):
        self.base_path = "/Applications/MAMP/htdocs/SSL/day2Python/controllers/"

    def validate(self, my_url):
        import re
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



        #Decaring variables for validation
        first_name = ""
        last_name = ""
        pass_one = ""
        pass_two = ""
        isValid = True
        form_valid = True

        # check for the first name
        #===================================================
        if my_url.getvalue("firstName"):
            isValid = True
            first_name = my_url.getvalue("firstName")
            print "FName True </br><hr>"
        else:
            print "FName False </br><hr>"
            isValid = False

        #check for the last name
        #===================================================
        if my_url.getvalue("lastName"):
            print "LName True </br><hr>"
            last_name = my_url.getvalue("lastName")
            isValid = True
        else:
            print "LName False </br><hr>"
            isValid = False

        #check for the passwords
        #===================================================
        if my_url.getvalue("pass1"):
            print "P1 True </br><hr>"
            pass_one = my_url.getvalue("pass1")
            isValid = True
        else:
            print "P1 False </br><hr>"
            isValid = False

        #check for the passwords
        #===================================================
        if my_url.getvalue("pass2"):
            print "p2 True </br><hr>"
            pass_two = my_url.getvalue("pass2")
            isValid = True
        else:
            print "p2 False </br><hr>"
            isValid = False

        #Regular Expression validation
        #===================================================
        if isValid:
            #check the first name
            #===================================================
            regex_fName = re.search("^[a-zA-Z]", first_name)
            if regex_fName:
                print "name is valid </br><hr>"
                form_valid = True
            else:
                print "fname not valid </br><hr>"

            #check the last name
            #===================================================
            regex_lName = re.search("^[a-zA-Z]", last_name)
            if regex_lName:
                print "last name is valid </br><hr>"
                form_valid = True
            else:
                for_valid = False
                print "lname not valid </br><hr>"

            #check pass 1
            #===================================================
            regex_pass1 = re.search("^[a-z-A-Z0-9]", pass_one)
            if regex_pass1:
                print "pass1 valid </br><hr>"
                form_valid = True
            else:
                form_valid = False
                print "pass1 not valid </br><hr>s"

            #check pass 2
            #===================================================
            regex_pass2 = re.search("^[a-z-A-Z0-9]", pass_two)
            if regex_pass2:
                print "pass2 valid </br><hr>"
                form_valid = True
            else:
                form_valid = False
                print "pass2 not valid </br><hr>"

            #check if passwords match
            #===================================================
            if pass_one != pass_two:
                form_valid = False
        else:
            form_valid = False

        if form_valid:
            print "woohoo"

        else:
            print "aww"




  # #==== NAME VALIDATION
  #
  #           if testForm["first_name"].value:
  #               fName = testForm["first_name"].value
  #           else:
  #               fName = ""
  #           regexName = re.search("^[a-zA-Z]+", fName)
  #           if regexName:
  #               # print "match"
  #               fNameCheck = True
  #
  #           else:
  #               # print "no Match"
  #               fNameCheck = False


# import cgi, cgitb
#
# # Create instance of FieldStorage
# form = cgi.FieldStorage()
#
# # Get data from fields
# first_name = form.getvalue('first_name')
# last_name  = form.getvalue('last_name')
