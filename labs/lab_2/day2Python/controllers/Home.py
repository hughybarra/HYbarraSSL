#!/usr/bin/python
__author__ = 'Hugh'

class Home:

    def __init__(self):
        self.base_path = "/Applications/MAMP/htdocs/SSL/day2Python/controllers/"

    def get(self, myUrl):
        if "action" not in myUrl:
            action = "home"
        else:
            action = myUrl.getvalue('action')

        data = {}

        import models.view
        from models.view import View
        view_model = View()
        view_model.print_header()

        if action == "home":
            view_model.get_view("header", data)
            view_model.get_view("homePage/content", data)
            view_model.get_view("lab_two/lab_two_form",data)
            view_model.get_view("homePage/footer",data)
        elif action == "lab_two_form":
            pass
        else:
           pass