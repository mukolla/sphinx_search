sudo indexer --all --config /home/www/search/sphinx.conf 

sudo searchd --config /home/www/search/sphinx.conf 

## если демон уже запущен
/usr/local/sphinx/bin/indexer --all --rotate


В  /etc/rc.local  прописать
# Запускаем демона Сфинкс
/usr/local/sphinx/bin/searchd --config /usr/local/sphinx/etc/sphinx.conf



Для различной частоты индексации объектов разного типа, в планировщик необходимо добавить следующие инстукции:
12 */3 * * *  /usr/local/sphinx/bin/indexer --rotate topicsIndex > /dev/null 2>&1
*/50 * * * *  /usr/local/sphinx/bin/indexer --rotate commentsIndex > /dev/null 2>&1

(означает индексацию топиков каждые 3 часа с запуском процесса на 12ой минуте часа и индексацию комментариев каждые 50 минут)