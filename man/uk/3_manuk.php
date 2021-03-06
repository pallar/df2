<?php
// Modified: 06.03.2017
include "../../f_vars0.php";
?>

<title>Інтернет-Ферма. Iнструкцiя. Доїльний зал</title>
</head>
<?php
include "0_menuuk.php";
?>
			<tr style='background:#f0ffff' height='40'>
				<td colspan='6'>
					<div style='margin-left:7; margin-right:7'><font size='+2'><b>Доїльний зал</b></font></div>
				</td>
			</tr>
			</table>
		</div></div>
		<div id='content' style='background:#f0ffff; height:60%; overflow-y:auto'><div style='margin-left:7; margin-right:7'>
<p></p>
			<div style='float:left; margin:7'><img border='0' src='files/301_00.jpg'></div>
<p>Доїльний зал типу «Ялинка» забезпечує високий рівень надійності та стабільності, характеризується комфортом для тварин, хорошим позиціонуванням тварин, а також безпекою для оператора машинного доїння. Широка зона входу дозволяє тваринам швидко та безперешкодно входити до доїльного залу. Вхідні ворота закриваються у рівень з останнім доїльним місцем і відповідають за хороше позиціонування всієї групи. Наступні тварини залишаються в активній позиції очікування.</p>
<b>Порядок роботи:</b><br>
<p>Доїння тварин проводиться партіями, величина яких відповідає кількості місць з одного боку доїльної ями.</p>
			<div style='float:right; margin:7'><img border='0' src='files/301_01.jpg'></div>
<p>Тварини заходять на переддоїльну площадку та очікують поки оператор машинного доїння відкриє вхідні ворота. Після їх відкриття система розпізнавання починає свою роботу. Для кожної тварини, яка проходить через неї, зчитується код транспондера та підраховується її порядковий номер в черзі. Після проходження останньої тварини вхідні ворота автоматично зачиняються. До процесорного блока надсилається інформація про розташування тварин в черзі. Через декілька секунд на індикаторах доїльних апаратів цієї сторони з’являються номери тварин.</p>
<p>В цей час оператор має готувати тварин до доїння. Доїння розпочинається з вмикання на апараті режиму доїння. Одразу після цього на дійки встановлюються доїльні стакани. Визначений час апарат буде утримувати ці стакани в піднятому стані, а потім опустить їх донизу. Всі подальші дії доїльний апарат виконує автоматично. Далі оператор може переходити до обслуговування наступної тварини.</p>
<p>В процесі доїння апарат підраховує кількість молока, а також контролює молоковіддачу. В залежності від фази доїння, а також потоку молока доїльний апарат управляє алгоритмом роботи пульсатора, клапаном `Масаж` та клапаном `Підтримка`. Після завершення доїння маніпулятор автоматично знімає доїльні стакани, а доїльний апарат надсилає до процесорного блока детальний звіт про результати доїння.</p>
<p>Після завершення доїння всіх тварин з одного боку оператор відкриває вихідні ворота та випускає тварин, після чого закриває вихідні ворота, відкриває вхідні ворота та впускає наступну партію.</p>
			<div style='float:right; margin:7'><img border='0' src='files/301_02.jpg'></div>
<b>Нестандартні ситуації:</b><br>
<p><b>1. Неповна кількість тварин</b></p>
<p>У тих випадках, коли до доїльного залу заходить неповна кількість тварин, система розпізнавання протягом трьох хвилин продовжує очікувати на тварину. При цьому вхідні ворота залишаються відкритими, а на доїльних апаратах не з’являються номери тварин, які щойно увійшли. В той же час оператор може розпочинати доїння. По завершенні трьох хвилин очікування система розпізнавання закриває вхідні ворота, а до процесорного блока надходить інформація про коди транспондерів тварин з цього боку доїльної ями.</p>
<p><b>2. Впав доїльний апарат чи стакан</b></p>
<p>У цьому випадку оператор може примусово зупинити доїльний апарат, а потім знову запустити його та встановити стакани на дійки. У випадку, якщо ці дії оператор виконав протягом 20 секунд з моменту переривання доїння, процес доїння продовжується. В протилежному випадку апарат розпочне доїння з початку, надіславши до процесорного блока результати попереднього доїння.</p>
<p><b>3. Перерване доїння</b></p>
<p>Оператор може примусово завершити доїння натисканням на апараті кнопки `Старт/Стоп`. До процесорного блока будуть надіслані результати доїння та сигнал, що доїння було примусово перервано.</p>
<b>Повідомлення доїльного апарата:</b><br>
<p><b>1. Немає припуску</b></p>
<p>Якщо тварина після початку доїння протягом певного часу не почала давати молоко, то доїльний апарат переводить цифровий індикатор в режим перемикання (БД-05) або вмикає та вимикає відповідний світлодіод (БД-06). Це означає, що тварина тугодійна або хвора, або погано підготовлена до доїння.</p>
<p><b>2. Низький надій</b></p>
<p>Якщо надій тварини впав більше ніж на 20 % в порівнянні з аналогічним (ранковим, денним, вечірнім) за попередній день, то на доїльному апараті починає блимати світлодіод `Низький надій`.</p>
<p><b>3. Заборона доїння</b></p>
<p>Якщо зоотехнік в програмі вказав, що тварину не можна доїти (наприклад, у неї мастит або йде лікування), а вона потрапила в доїльний зал, то в такому випадку на доїльному апараті заблокується клавіатура та почнуть блимати всі світлодіоди (БД-05) або світлодіод `Заборона доїння` (БД-06).</p>
<p><b>4. Обстеження на мастит</b></p>
<p>Якщо перед початком доїння персонал робить обстеження на мастит, то до доїльного апарата можна занести результати цього обстеження по кожній чверті окремо з вказанням ступеня маститу. Результати обстеження надсилаються до процесорного блока. Світлодіод `Мастит` сигналізує про виконане обстеження або про те, що в програмі тварина вже позначена хворою на мастит.</p>
<p><b>5. Травма</b></p>
<p>Якщо оператор машинного доїння виявив травму тварини, то він може повідомити про це зоотехніка натисканням кнопки `Травма`. Цей сигнал потрапить до електронної картки тварини.</p>
<p><b>6. Охота</b></p>
<p>У випадку виявлення відповідної поведінки тварини оператор аналогічно до п. 5 може повідомити про це зоотехніка.<p>
		</div></div>
		<div id='page-clear'></div>
	</div>
	<div id='footer'><div style='margin-left:0; margin-right:0'>
		<table align='center' border='0' cellpadding='0' cellspacing='0' height='100%' width='100%'>
		<tr background='files/menu.jpg'>
			<td></td>
		</tr>
		</table>
	</div></div>
</body>
</html>
