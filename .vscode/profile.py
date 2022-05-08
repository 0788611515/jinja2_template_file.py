import jinja2
import os

jinja_env = jinja2.Environment(loader=jinja2.FileSystemLoader('template'))

jinja_var = {
    'title': 'Question 1'
}


template = jinja_env.get_template('content.html')
print(template.render(jinja_var))