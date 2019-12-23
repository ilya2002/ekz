var intr;

window.onload = show_messages();

function show_messages()
{var url = window.location.href;
if (url.indexOf('index')!= -1){

		$.ajax({
		url: "index1",
		success: function(res)
		{
			var div = document.getElementById("chat-box");
			div.innerHTML = res;
			
		} 
	})
}}

function send_messages()
{
	var text = document.getElementById("text").value;
	if(text != "")
	{ 
		$.ajax({
			url: "indexone",
			type: "post",
			data: {"text": text},
			success: function(res)
			{
				show_messages();
				$("#text").val("");
			}
		})
	}
}
setInterval(show_messages, 1000);
 function addHirer()
 { var div = document.getElementById("id");
 div.innerHTML += '<div class="form-group field-taskhirer-id_hirer required"><label class="control-label" for="taskhirer-id_hirer">Сотрудник</label><select name="TaskHirer[id_hirer][]" class="form-control" id="taskhirer-id_hirer"><option value="18">Nikita</option><option value="20">Димас</option></select><div class="help-block"></div></div>';}