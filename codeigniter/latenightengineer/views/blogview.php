<html>
<head>
<title><?php echo $title;?></title>
</head>
<body>
<h1>CodeIgniter a Framework for People Building Websites wih PHP</h1>
<p>CodeIgniter is an Application Development Framework - a toolkit - for people who build web sites using PHP. Its goal is to enable you to develop projects much faster than you could if you were writing code from scratch, by providing a rich set of libraries for commonly needed tasks, as well as a simple interface and logical structure to access these libraries. CodeIgniter lets you creatively focus on your project by minimizing the amount of code needed for a given task.

Please read the Introduction section of the User Guide to learn the broad concepts behind CodeIgniter, then read the Getting Started page.</p>	
<h2>Day One - Understanding the Model View Controller Pattern</h2>
	
CodeIgniter is based on the Model-View-Controller software development pattern. 
MVC separates application logic from presentation. (similarly to CSS separating mark-up from presentation), but in this case is the application logic that is separated.Some people actually theorize that html pages are inherently MVC pattern. Model=html, css=view controller=browser
http://www.codinghorror.com/blog/archives/001112.html

In practice, your web pages will contain minimal php code since the presentation is separate from the PHP scripting.

<ul>
 <li> The Model represents your data structures. Typically your model classes will contain functions that help you retrieve, insert, and update information in your database.</li>
 <li> The View is the information that is being presented to a user. A View will normally be a web page, but in CodeIgniter, a view can also be a page fragment like a header or footer. It can also be an RSS page, or any other type of "page".</li>
 <li> The Controller serves as an intermediary between the Model, the View, and any other resources needed to process the HTTP request and generate a web page.</li>
</ul>

CodeIgniter has a fairly loose approach to MVC since Models are not required. If you don't need the added separation, or find that maintaining models requires more complexity than you want, you can ignore them and build your application minimally using Controllers and Views. CodeIgniter also enables you to incorporate your own existing scripts, or even develop core libraries for the system, enabling you to work in a way that makes the most sense to you.


<ul>
<?php foreach($todo_list as $item):?>

<li><?php echo $item;?></li>

<?php endforeach;?>
</ul>
<img src="../images/application.jpg" />
<pre>
<?php echo htmlentities('<html>
<head>
<title><?php echo $title;?></title>
</head>
<body>
<h1><?php echo $heading;?></h1>
	
<h3>My Todo List</h3>	

<ul>
<?php foreach($todo_list as $item):?>

<li><?php echo $item;?></li>

<?php endforeach;?>
</ul>
</body>
</html>'
);?>
</pre>

<h2>Which Framework is For Me?</h2>
They’re probably too different and too good in their own right to choose between them. Probably better to treat them as two different tools that both have their place, rather than two rival frameworks.

<h2>Integration with jVision</h2>

jVision is an attempt to simplify things. jVision is not a templating language, it is not a new language, it is not a framework.Is another way of creating a wizard. You can think of it as a nakedWizard!

The form file is the description of your project.
The parser will then produce the following

An object Model of your project


A controller file
A model file if necessary
A view file 
Load all the necessary accessories

For example

project model -  create  a page with tabs
read .frm file and parse (This is the controller)
      output the view file
      content : create the scaffolding page (back-end)
      other

This is the way to go, in order to make it into a productive environment

Strive AUTOMATIC WORDPRESS THEME GENERATION

header:
sidebar:
sidebar:
footer:
error:
...... etc

edit1....edit100

































	
</body>
</html>
