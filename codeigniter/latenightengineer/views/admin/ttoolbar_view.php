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
        $(".sortable").disableSelection();
    });
</script>

<div  class="bordered curvy clearfix resizable" style="width:50%;float:left;margin-top:30px">

    <div id="srtable" class="sortable clearfix" style="margin:0 auto;width:98%">

        <span style="font-size:9px;margin:0;padding:0;padding-left:45px;padding-right:7px;display:block">
            
            {This is a Caption}
        </span>



        <!-- start loop -->
        {table}
    

    </div>
<p  class="bordered curvy container sprite-help" style="width:300px;height:30px;clear:both"></p>
<div id="c" class="bordered curvy container sprite-info" style="width:300px;height:300px;clear:both"></div>
</div>
