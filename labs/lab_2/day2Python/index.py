#!/usr/bin/python
__author__ = 'Hugh'


#imports
#===============================================
import cgi,cgitb
# import sys
# sys.path.append("/Applications/MAMP/htdocs/SSL/day2Python/models")
cgitb.enable()

my_url = cgi.FieldStorage()

#check for action in the url
if "action" not in my_url:
    action = "home"
else:
    action = my_url.getvalue("action")

if action == "home":
    from controllers.Home import Home
    load_page = Home()
    load_page.get(my_url)

elif action == "lab_one_form":
    from models.forms.lab_two_form_validation import Validate_Lab_Two_Form
    validate_form = Validate_Lab_Two_Form()
    validate_form.validate_form(my_url)

elif action == "login":
    from models.forms.lab_two_login import validate_login
    log_me_in = validate_login()
    log_me_in.v_login(my_url)







