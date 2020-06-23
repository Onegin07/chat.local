// Открыть модальное окно контактов
var btnOpenContact = document.querySelector("#open_contact");
btnOpenContact.onclick = function() {
	var contactsModal = document.querySelector("#contacts-modal");
	    contactsModal.style.display = "block";
}
// Закрыть модальное окно контактов
var contactsModalCloseBtn = document.querySelector("#contacts-modal .close");
    contactsModalCloseBtn.onclick = function() {
    	var contactsModal = document.querySelector("#contacts-modal");
	    contactsModal.style.display = "none";
    }

// Открыть модальное окно войти
//var btnOpenLogin = document.querySelector("#open_login");
//btnOpenLogin.onclick = function() {
//	var loginSecurity = document.querySelector("#login-security");
//	   loginSecurity.style.display = "block";
//}
// Закрыть модальное окно войти
//var loginSecurityCloseBtn = document.querySelector("#login-security .close");
 //   loginSecurityCloseBtn.onclick = function() {
 //   	var loginSecurity = document.querySelector("#login-security");
//	    loginSecurity.style.display = "none";
  //  }

/*

1. Вынести вывод всех контактов в отдельный файл - готово
2. JS - Добавить события на кнопку добавить в друзья
3. JS - отправить запрос на сервер
4. Если запрос выполнен успешно, вывести контакты 

*/
// функция добавления из друзей
function add(element) {
	var friend_list = document.querySelector("#friend_list");
	console.dir(element);
	var ssylka = element.dataset.ssylka;
	// Создать обьект для отправки http запроса
	var ajax = new XMLHttpRequest();
	    // открываем ссылку, передавая метод запроса и саму ссылку
        ajax.open("GET", ssylka, false);
        // отправляем запрос
        ajax.send();
	// Меняем контент в блоке #friend_list
	friend_list.innerHTML = ajax.response;
}
// функция удаления из друзей
function del(element) {
	var friend_list = document.querySelector("#friend_list");
	console.dir(element);
	var ssylka = element.dataset.ssylka;
	// Создать обьект для отправки http запроса
	var ajax = new XMLHttpRequest();
	    // открываем ссылку, передавая метод запроса и саму ссылку
        ajax.open("GET", ssylka, false);
        // отправляем запрос
        ajax.send();
	// Меняем контент в блоке #friend_list
	friend_list.innerHTML = ajax.response;
}


var form = document.querySelector("#form");
form.onsubmit = function(sobitye) {
	sobitye.preventDefault();
   
	var komu = form.querySelector("input[name='komu_polzovatel_id']"); // element
	var ot = form.querySelector("input[name='ot_polzovatel_id']");
	var text = form.querySelector("textarea");

    var dannie = "otpravka_sms=1" + 
                 "&komu_polzovatel_id=" + komu.value +
                 "&ot_polzovatel_id=" + ot.value +
                 "&text=" + text.value;

	var ajax = new XMLHttpRequest();
	    ajax.open("POST", form.action, false);
	    ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	    ajax.send(dannie);

    var spisokSoobsheniy = document.querySelector("#spisok-soobsheniy");
        spisokSoobsheniy.innerHTML = ajax.response;
}


var poisk = document.querySelector("#poisk");
poisk.onsubmit = function(sobitye) {
	sobitye.preventDefault();
   
	var poiskText = form.querySelector("input[name='poisk-text']");

    var dannie = "poisk_contacts=1" + 
                 "&text=" + text.value;

	var ajax = new XMLHttpRequest();
	    ajax.open("GET", form.action, false);
	    ajax.send(dannie);

    var users = document.querySelector("#users");
        users.innerHTML = ajax.response;
}