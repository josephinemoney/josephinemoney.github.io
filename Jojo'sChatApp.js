function process_login()
{
	var namenode = document.getElementById("login_name");
	var nameinner = namenode.value;
	if (nameinner){
	var welcomenode = document.getElementById("welcome");
	welcomenode.value = "Welcome " + nameinner + "!";
	var query_string = "name=" + nameinner;
	do_ajax_stuff(query_string);
}
}

function do_ajax_stuff(query_string) 
		{
			var xhr = new XMLHttpRequest();
			alert("query string is: " + query_string);
			xhr.open("GET", "http://pic.ucla.edu/~josephinemoney/final_project/insert_user.php?" + query_string,true);
			xhr.send(null);
		}

function init(){
	setInterval("do_ajax()", 1000);
	setInterval("ajax_display_msg()", 1000);
}

function do_ajax(){
			var xhr = new XMLHttpRequest();

			xhr.onreadystatechange = function () 
			{
				if (xhr.readyState == 4 && xhr.status == 200) 
				{
					var result = xhr.responseText;
					onlinersnode = document.getElementById("onliners");
					onlinersnode.innerHTML = result;
					
				}
			}	
 
			xhr.open("GET", "http://pic.ucla.edu/~josephinemoney/final_project/display_users.php",true);
			xhr.send(null);
}

function ajax_stuff(){
			var xhr = new XMLHttpRequest();

			xhr.onreadystatechange = function () 
			{

				if (xhr.readyState == 4 && xhr.status == 200) 
				{
					var result = xhr.responseText;
					onlinersnode = document.getElementById("onliners");
					onlinersnode.innerHTML = result;
					
				}
			}	
 
			xhr.open("GET", "http://pic.ucla.edu/~josephinemoney/final_project/logout.php",true);
			xhr.send(null);
}

function process_msg()
{
	var msgnode = document.getElementById("entermessage"); 
	var msginner = msgnode.value; 
	if (msginner)
	{
	var q_string = "msg=" + msginner; 
	ajax_insert_msg(q_string); 
	}
}

function ajax_insert_msg(q_string)
{
			var xhr = new XMLHttpRequest();
			alert("query string is: " + q_string);
			
			xhr.onreadystatechange = function () 
			{

				if (xhr.readyState == 4 && xhr.status == 200) 
				{
					var result = xhr.responseText;
					messagenode = document.getElementById("messages");
					messagenode.innerHTML = result;
				}
			}	
			
			
			xhr.open("GET", "http://pic.ucla.edu/~josephinemoney/final_project/insert_msg.php" + q_string,true);
			xhr.send(null);	
}

function ajax_display_msg()
{
	var xhr = new XMLHttpRequest();

			xhr.onreadystatechange = function () 
			{

				if (xhr.readyState == 4 && xhr.status == 200) 
				{
					var result = xhr.responseText;
					messagenode = document.getElementById("messages");
					messagenode.innerHTML = result;
				}
			}	
 
			xhr.open("GET", "http://pic.ucla.edu/~josephinemoney/final_project/display_msg.php",true);
			xhr.send(null);
}