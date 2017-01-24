# Методы класса logic_game
connection_bd() - подключение к бд \n
random_generator_number() - Генерирует случайное число без повторения
get_int_user($id_user, $ft) - получает все значения пользователя, где параметр $id_user - это id пользователя, а $ft -  true -  выведет информацию  false - не выведет информацию 
generates_number_of_players($id_user) - генерирует случайное число для пользователя, и заносить число в бд
get_int_post_user() - получает число от пользователя.
addition_int($id_int_game_user, $ints_user, $id_user, $cow, $bull) - сохраняет информацию о ходах игрока в бд, где $id_int_game_user - индетификаток попытки угадывания, $ints_user - число которое ввел пользователь, $cow - количество коров, $bull - количество быков
