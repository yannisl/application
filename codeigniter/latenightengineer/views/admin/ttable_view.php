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

<div  class="bordered curvy clearfix resizable" style="width:40%;float:left;margin-right:30px;margin-top:30px">

    <div id="srtable" class="sortable clearfix" style="margin:0 auto;width:98%">

        <span style="font-size:9px;margin:0;padding:0;padding-left:45px;padding-right:7px;display:block">
            {caption}<input type="text" value="" class="keyboardInput">test
        </span>



        <!-- start loop -->
        {table}
        

    </div>

</div>
