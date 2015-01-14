$(document).ready(function(){

    // Disable href="#" links
    $('a').click(function(){if ($(this).attr('href') == '#') {return false;}});
    $('a').live('click', function(){if ($(this).attr('href') == '#') {return false;}});

    //Menu
    jQuery('#menu > ul').superfish({ 
        delay:       0,
        animation:   {
            opacity:'show',
            height:'show'
        },
        speed:       'fast',
        autoArrows:  false
    });
    (function() {
		var $menu = $('#menu ul'),
			optionsList = '<option value="" selected>Menu...</option>';

		$menu.find('li').each(function() {
			var $this   = $(this),
				$anchor = $this.children('a'),
				depth   = $this.parents('ul').length - 1,
				indent  = '';

			if( depth ) {
				while( depth > 0 ) {
					indent += ' - ';
					depth--;
				}
			}
			optionsList += '<option value="' + $anchor.attr('href') + '">' + indent + ' ' + $anchor.text() + '</option>';
		}).end().after('<select class="res-menu">' + optionsList + '</select>');

		$('.res-menu').on('change', function() {
			window.location = $(this).val();
		});
		
	})();
    
	if($(document).height()>$('#home').height()){
		var addheight=$(document).height()-$('#home').height();
		$('.pagewidth').css('padding-bottom',addheight);
	}

	$.fn.myScroll = function(options){
	//默认配置
	var defaults = {
		speed:40,  //滚动速度,值越大速度越慢
		rowHeight:24 //每行的高度
	};
	
	var opts = $.extend({}, defaults, options),intId = [];
	
	function marquee(obj, step){
	
		obj.find("ul").animate({
			marginTop: '-=1'
		},0,function(){
				var s = Math.abs(parseInt($(this).css("margin-top")));
				if(s >= step){
					$(this).find("li").slice(0, 1).appendTo($(this));
					$(this).css("margin-top", 0);
				}
			});
		}
		
		this.each(function(i){
			var sh = opts["rowHeight"],speed = opts["speed"],_this = $(this);
			intId[i] = setInterval(function(){
				if(_this.find("ul").height()<=_this.height()){
					clearInterval(intId[i]);
				}else{
					marquee(_this, sh);
				}
			}, speed);

			_this.hover(function(){
				clearInterval(intId[i]);
			},function(){
				intId[i] = setInterval(function(){
					if(_this.find("ul").height()<=_this.height()){
						clearInterval(intId[i]);
					}else{
						marquee(_this, sh);
					}
				}, speed);
			});
		
		});

	}

    $("div.ranklist").myScroll({
		speed:40,
		rowHeight:24
	});
});



function changeDiv( nFlag )
{
	if( nFlag == 1)
	{
       $str='';
        $str+="<tr>";
        $str+="<td><select name='logical2' style='width:80px;'><option value='and' selected=''>并且</option><option value='or'>或者</option><option value='not'>不包含 </option></select></td>";
        $str+="<td>"+  $("table tr:eq(1) td:eq(1)").html()  +"</td>";
        $str+="<td>"+  $("table tr:eq(1) td:eq(2)").html()  +"</td>";
        $str+="<td></td>";
        $str+="</tr>";
        //var tr = "<tr>"+"<td><select name='logical2'><option value='and' selected="">并且</option><option value='or'>或者</option><option value='not'>不包含 </option></select></td>"+  "<td></td>"  +"</tr>";  
        $("#searchtable").append($str);
	}else if( nFlag == 0)
	{
		if($("#searchtable tr").length>2){
			$("#searchtable tr:last").remove();
		}
	}
}
	
