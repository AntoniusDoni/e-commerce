<style>
    .tree-megamenu{
        width:100%;	
        float:left;
        overflow:hidden;
        margin-right:20px;
    }
    .megamenu-form{
        width: 60%
    }
    td > i {
        display:block;
        font-size:11px;
    }
    .quickdel{
        background:url(../images/filemanager/edit-delete.png) no-repeat center center;

    }
    .quickedit{
        background:url(../images/filemanager/edit-rename.png) no-repeat center center;
    }
    .quickedit, .quickdel{
        float:right;
        width:25px;
        height:16px;
        display:block;
        cursor:hand; cursor:pointer;
        overflow:hidden;
        text-indent:-999em;
        margin:0 5px;
    }
    .hide{
        display:none
    }
    .show{
        display:block
    }
    #ajaxloading{
        position:fixed;
        top:0;
        right:0;
        width:100%;
        z-index:1200
    }
    #ajaxloading > div{
        margin:12px;
    }	
    .megamenu-form{
        float:left;
    }
    .placeholder {
        outline: 1px dashed #4183C4;
        /*-webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        margin: -1px;*/
    }

    .mjs-nestedSortable-error {
        background: #fbe3e4;
        border-color: transparent;
    }

    ol {
        margin: 0;
        padding: 0;
        padding-left: 30px;
    }

    ol.sortable, ol.sortable ol {
        margin: 0 0 0 25px;
        padding: 0;
        list-style-type: none;
    }

    ol.sortable {
        margin: 4em 0;
    }

    .sortable li {
        margin: 5px 0 0 0;
        padding: 0;
    }

    .sortable li div  {
        border: 1px solid #d4d4d4;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        border-color: #D4D4D4 #D4D4D4 #BCBCBC;
        padding: 6px;
        margin: 0;
        cursor: move;
        background: #f6f6f6;
        background: -moz-linear-gradient(top,  #ffffff 0%, #f6f6f6 47%, #ededed 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(47%,#f6f6f6), color-stop(100%,#ededed));
        background: -webkit-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#ededed 100%);
        background: -o-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#ededed 100%);
        background: -ms-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#ededed 100%);
        background: linear-gradient(to bottom,  #ffffff 0%,#f6f6f6 47%,#ededed 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#ededed',GradientType=0 );
    }

    .sortable li.mjs-nestedSortable-branch div {
        background: -moz-linear-gradient(top,  #ffffff 0%, #f6f6f6 47%, #f0ece9 100%);
        background: -webkit-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#f0ece9 100%);

    }

    .sortable li.mjs-nestedSortable-leaf div {
        background: -moz-linear-gradient(top,  #ffffff 0%, #f6f6f6 47%, #bcccbc 100%);
        background: -webkit-linear-gradient(top,  #ffffff 0%,#f6f6f6 47%,#bcccbc 100%);

    }

    li.mjs-nestedSortable-collapsed.mjs-nestedSortable-hovering div {
        border-color: #999;
        background: #fafafa;
    }

    .disclose {
        cursor: pointer;
        width: 10px;
        display: none;
    }

    .sortable li.mjs-nestedSortable-collapsed > ol {
        display: none;
    }

    .sortable li.mjs-nestedSortable-branch > div > .disclose {
        display: inline-block;
    }

    .sortable li.mjs-nestedSortable-collapsed > div > .disclose > span:before {
        content: '+ ';
    }

    .sortable li.mjs-nestedSortable-expanded > div > .disclose > span:before {
        content: '- ';
    }
</style>
<div class="navbar navbar-default">
    <nav id="mainmenutop" class="megamenu" role="navigation" style="overflow: scroll;">
        <div class="navbar-header" >
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <?php echo $treemenu; ?>
            </div></div>
    </nav>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/jquery/jquery.nestable.js"></script>
<script>
    $(document).ready(function () {
        $('ol.sortable').nestedSortable({
            forcePlaceholderSize: true,
            handle: 'div',
            helper: 'clone',
            items: 'li',
            opacity: .6,
            placeholder: 'placeholder',
            revert: 250,
            tabSize: 25,
            tolerance: 'pointer',
            toleranceElement: '> div',
            maxLevels: 4,
            isTree: true,
            expandOnHover: 700,
            startCollapsed: true
        });
        $('#serialize').click(function () {
            var serialized = $('ol.sortable').nestedSortable('serialize');
            $.ajax({
                async: false,
                type: 'POST',
                dataType: 'json',
                url: "<?php echo base_url();?>jpmp/menu/update?root=0",
                data: serialized,
                success: function (r) {
                    alert("Data Update");
                }
            });
        });


    });
</script>