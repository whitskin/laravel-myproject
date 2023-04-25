<h1>Proje Tanımı</h1>
<p>
 Bu proje basit bir üyelik oluşturma personal ekleme düzenleme silme listeleme filitreleme departman ekleme düzenleme silme üzerine yapılmış basit bir laravel projesidir.
 </p>
 
<ul dir="auto">
<li>PHP &gt;= 8.2.0</li>
<li>Laravel &gt;= 10</li>
</ul>

<h1>İlk Adım : Kurulum</h1>

Laravel kurulumu için <a href="https://getcomposer.org/" target="_blank">Composer</a> 'ı kullanmakta. Dolayısıyla Laravel'i kullanmaya başlamadan önce sisteminize Composer'ı kurmanız gerekmekte.

<ul dir="auto">
<li>
<p dir="auto">Laravel installer</p>
<p dir="auto">Kurulum için tavsiye ettiğimiz yöntem budur.
Composer aracılığıyla Laravel installer'ı kurun:</p>
<p dir="auto"><code>composer global require "laravel/installer"</code></p>
<p dir="auto">Installer yüklenikten sonra bu projeyi bilgisayarınıza indirin.

<pre class="notranslate"><code>git clone git@github.com:whitskin/laravel-myproject.git myproject
composer install
cp .env.example .env</code>
</pre>  
    
</p>
</li>
<li>
<p dir="auto">Ardından database oluşturalım
 <pre class="notranslate"><code>php artisan db
create database databaseadı</code>
</pre>
 </p>
 
   Ardından tabloları database yükleyelim.
<pre class="notranslate"><code>php artisan migrate --seed</code>
</pre>
</li>
</ul>

<h2>Özellikler</h2>
<ol dir="auto">
<li>Üyelik oluşturma.</li>
<li>Personal ekleme , düzenleme , silme , listeleme, filitreleme yapabilirsiniz.</li>
 <li>Departman ekleme , düzenleme , silme , listeleme yapabilirsiniz.</li>
</ol>
