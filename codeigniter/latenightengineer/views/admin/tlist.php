<!--{{template:tlist used for lists -->
<script type="text/javascript">
                $(function() {
                $(".sortable").sortable({
                placeholder: 'ui-state-highlight',
                sortable:({items: 'div'}),
                helper: 'clone',
                forceHelperSize:true,
                forcePlaceholderSize:true
                });
                $("#sortable").disableSelection();
                });
 </script>

<div  class="draggable curvy clearfix bordered" style="width:98%;float:left">

    <div id="srtable" class="panel-hover bordered curvy resizable sortable clearfix" style="float:left;width:98%">

        <span style="font-size:9px;margin:0;padding:0;padding-left:45px;padding-right:7px;display:block">
        {caption}
        </span>
  


    <!-- start loop -->
    {images}
    
    <div  class="edit curvy bordered clearfix " style="padding:4px;width:23%;float:left">
    <img  src="{basedir}{image}" style="display:block;margin-top:3px;margin:0 auto;height:150px;width:130px;clear:both"/>

    <div class="details hidden">
    <p> This is a details panel that goes underneath to be opened on click</p>
    <input class="curvy" type="text" name="test" value="tags" />

    </div>




        <span style="width:20px;float:left">
            <a href="{basedir}{image}" title="View larger image" class="ui-icon ui-icon-zoomin">View larger</a>
        </span>
        <span style="width:20px;float:left">
            <a href="link/to/trash/script/when/we/have/js/off" title="Delete this image"  class="ui-icon ui-icon-trash">
                Delete image
            </a>
        </span>
        <span style="width:20px;float:left"><a href="link/to/trash/script/when/we/have/js/off" title="save this image"  class="ui-icon ui-icon-check">save image</a></span>
        <span style="width:20px;float:left"><a href="link/to/trash/script/when/we/have/js/off" title="save this image"  class="ui-icon ui-icon-close">save image</a></span>
        <span style="width:20px;float:left"><a href="link/to/trash/script/when/we/have/js/off" title="save this image"  class="ui-icon ui-icon-zoomin">zoom in</a></span>

        <!--end loop-->


    </div>
    {/images}
    <!-- small footer with object name -->
    <div style="font-size:9px;color:red;text-align:right">
        {name}
    </div>
</div>

</div>
