#!/usr/bin/python
__author__ = 'Hugh'
from os.path import isfile
from string import Template


class View:

    def __init__(self):
        self.base_path = "/Applications/MAMP/htdocs/SSL/day2Python/views"

    def print_header(self):
        print "Content-type: text/html\n\n"
        print

    def get_view(self, file, data=[]):

        full_path_to_view = self.base_path +"/"+ str(file) + ".py"

        if isfile(full_path_to_view):
            #open file for reading
            file_handle = open(full_path_to_view, "r")

            #loop through each line of the file
            for line in file_handle:
                print Template(line).substitute(data)

