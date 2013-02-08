
<!--{{feature-image:http://localhost/CodeIgniter/images/boxer.jpg }}-->

<div class="clearfix" style="padding:0;margin:0;background:#fff;width:100%;padding-top:30px;padding-bottom:30px;">

<div id="tools" style="height:300px;width:90%;display:none">
<?php echo $test ?>
    <div style="height:50px;width:100%;border-top:3px solid #000;">
    <a id="toggle" href="#"><img src="http://localhost/CodeIgniter/images/icon/assets/toggle.jpg"
style="float-right;display:block;float:right;margin-right:70px" /></a></div>

</div>


<div id="imgContainer" style="float:left;width:30%">

 <img id="img" src="http://localhost/egypt/simon-procter/bazaar_step1.jpg" style="width:98%;display:block;float:left;margin:0 auto" />

   </div>

<div id="text-content" style="color:#666;font:13px Arial;width:40%;float:left;padding:50px;padding-top:0px;padding-bottom:0;
    border-right:1px solid #d3d3d3">
         

<h2 style="color:#333;font-family:Georgia,Times,serif;font-size:20px;line-height:1.3em;margin-bottom:13px">
Editing <sub>fk</sub>Components
</h2>
<p class="hometext">During edit mode the component inspectors are availble for editing of a component.
Just double click on the component to see it.
</p>
<p class="hometext"><strong>Change some of the properties and see the effect</strong>
</p>

<p class="hometext">
   fkComponnets have properties, they can draw content, they can morph into others, they can have
   children and they can inherit. On the next page we will examine some of the more important properties.
</p>

<h2 style="color:#333;font-family:Georgia,Times,serif;font-size:20px;line-height:1.3em;margin-bottom:13px">
Model View Controllers and <sub>fk</sub>Components
</h2>
<p class="hometext">
  Almost all components follow the MVC pattern of development.
  The incoming <strong>URI</strong>, provides the means for the user to tell the Page components what he wants them
  to do.

  The Controller handles all the communication, between the user, the Model and the View.

  The View is actually what the user will eventually see (although, not strictly correct in all the cases).


</p>
<h2 style="color:#333;font-family:Georgia,Times,serif;font-size:20px;line-height:1.3em;margin-bottom:13px">
Understanding Models
</h2>
<p class="hometext">
  Most people associate Models with databases. This is not actually true. Like in mathematical models, a model
  is a representation of some real objects. For example a set of files of your daily thoughts can be modelled
  in many ways. It can be listed alphabetically, daily, by topic or some other way.
</p>
<p class="hometext">
  If you have inspected the properties of this component, you will have noticed that the contents of this
  page are derived from a <strong>Model</strong> that draws information from the file system. In this case
  from <em>/manual/editing_fkComponents</em>. What it means there is a text file in the directory manual
  with the name <em>editing_fkComponents.</em>
  In the next section we will use a component that has a Model, that draws on Wikipedia content.
</p>

<?php echo $content ?>

   </div>

 




    <!--end container -->
</div>