# 🚀 Инструкция по запуску проекта

## 1️⃣ Клонирование репозитория

```bash
git clone https://github.com/a-kosimov/laravel_test.git
cd laravel_test
cp .env.example .env
2️⃣ Настройка переменных окружения
Открой файл .env и отредактируй параметры подключения к базе данных:


DB_CONNECTION=mysql
DB_HOST=laravel
DB_PORT=3306
DB_DATABASE=укажите_вашу_базу_данных
DB_USERNAME=ваш_пользователь
DB_PASSWORD=ваш_пароль
3️⃣ Установка зависимостей (если необходимо)

composer install
4️⃣ Запуск миграций

php artisan migrate
5️⃣ Заполнение базы тестовыми данными

php artisan db:seed --class=IntervalSeeder
6️⃣ Проверка Artisan-команды
Запустите команду, чтобы вывести интервалы, пересекающиеся с заданным интервалом:

php artisan intervals:list --left=15 --right=30
