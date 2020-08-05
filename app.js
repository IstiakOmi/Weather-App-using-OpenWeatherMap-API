var Button = document.querySelector('#button');
var inputValue = document.querySelector('#button');



var name = document.querySelector('.name');
var desc = document.querySelector('.desc');
var temp = document.querySelector('.temp');


button.addEventListener('click', function(){
	fetch('https://api.openweathermap.org/data/2.5/weather?q='+inputValue.value+'&appid=4c311ef6f718be1803cacd517477643e')
.then(response => rsponse.json())
.then(data => {
	var nameValue = data['name'];
	var tempValue = data['main']['temp'];
	var descValue = data['weather'][0]['description'];

	name.innerHTML = nameValue;
	temp.innerHTML = tempValue;
	desc.innerHTML = descValue;


})

.catch(err => alert("Wrong Info Provided!"));
})