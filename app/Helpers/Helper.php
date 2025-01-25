<?php

namespace app\Helpers;

use App\Models\MyConfig;

class Helper
{
	public static function getMyConfigCache($key)
	{
		// return cache()->get('cache_myconfigs')->where('key', $key)->first()->value ?? '';
		return MyConfig::where('key', $key)->first()->value ?? '';
	}

	public static function isProperMobile($mobile)
    {
        if($mobile != null && preg_match('/'. static::getMyConfigCache('mobile_format') . '/', $mobile))
            return true;
        
        return false;
	}
 
	public static function getMobileFormatForVerification()
	{
		return static::getMyConfigCache('mobile_format');
	}

	// public static function getMobileFormat()
	// {
	// 	return static::getMyConfigCache('mobile_format_regexp');
	// }

	public static function verifyPasswordPattern($pw)                                                                                                                                  
    {
        return preg_match_all(static::getMyConfigCache('password_pattern'), $pw, $out);
	}
	
	public static function generateSmsVerificationCode()
	{
		$length = (static::getMyConfigCache('two_factor_code_length') ?? 5);
		return rand(str_pad(1, $length, '0', STR_PAD_RIGHT), str_pad(9, $length, '9', STR_PAD_RIGHT));
	}

	public static function generateSmsExpireAt()
	{
		return now()->addMinutes(static::getMyConfigCache('two_factor_code_expire_mins') ?? 5);
	}

	public static function splitModel($model, $forward=false)
	{
		if(strlen($model)>0)
		{
			$tmp = ($forward == true) ? preg_split('/\//', $model) : $tmp = preg_split('/\\\\/', $model);
			return end($tmp);
		}
		return '';
	}

	public static function getTariffType()
	{
		return config('tariff');
	}

	public static function getSecureString($input, $append_string=null)
	{
		$append = ($append_string != null) ? $append_string : "";
		if(isset($input) && strlen(trim($input))>0)
			return trim(trim($input) . $append);

		return null;
	}
    public static function getPassportSeriaOptions()
    {
        return [
            'I-AS',
            'I-AH',
            'I-MR',
            'I-BN',
            'I-DZ',
            'I-LB',
            'II-AS',
            'II-AH',
            'II-MR',
            'II-BN',
            'II-DZ',
            'II-LB',
            'Other',
        ];
    }
    public static function getHotels(){
	    return [
	        ['id'=>1, 'name_en'=> "Yyldyz", 'name_tm'=> "Ýyldyz", 'name_ru'=> "Йылдыз"],
	        ['id'=>2, 'name_en'=> "Archabil", 'name_tm'=> "Arçabil", 'name_ru'=> "Арчабиль"],
	        ['id'=>3, 'name_en'=> "Sport", 'name_tm'=> "Sport", 'name_ru'=> "Спорт"],

        ];
    }
    public static function getHotelName($id)
    {
        $hotels = [
            ['id'=>1, 'name_en'=> "Yyldyz", 'name_tm'=> "Ýyldyz", 'name_ru'=> "Йылдыз"],
            ['id'=>2, 'name_en'=> "Archabil", 'name_tm'=> "Arçabil", 'name_ru'=> "Арчабиль"],
            ['id'=>3, 'name_en'=> "Sport", 'name_tm'=> "Sport", 'name_ru'=> "Спорт"],
        ];
        foreach ($hotels as $hotel){
            if($hotel['id'] == $id){
                return $hotel['name_tm'];
            }
        }
    }

    public static function getCountries(){
	    return [
  [ 'id'=> 1, 'name_en'=> "Afghanistan", 'name_tm'=> "Owganystan", 'name_ru'=> "Афганистан" ],
  [ 'id'=> 2, 'name_en'=> "Albania", 'name_tm'=> "Albaniýa", 'name_ru'=> "Албания" ],
  [ 'id'=> 3, 'name_en'=> "Algeria", 'name_tm'=> "Alžir", 'name_ru'=> "Алжир" ],
  [ 'id'=> 4, 'name_en'=> "Andorra", 'name_tm'=> "Andorra", 'name_ru'=> "Андорра" ],
  [ 'id'=> 5, 'name_en'=> "Angola", 'name_tm'=> "Angola", 'name_ru'=> "Ангола" ],
  [ 'id'=> 6, 'name_en'=> "Antigua and Barbuda", 'name_tm'=> "Antigua we Barbuda", 'name_ru'=> "Антигуа и Барбуда" ],
  [ 'id'=> 7, 'name_en'=> "Argentina", 'name_tm'=> "Argentina", 'name_ru'=> "Аргентина" ],
  [ 'id'=> 8, 'name_en'=> "Armenia", 'name_tm'=> "Ermenistan", 'name_ru'=> "Армения" ],
  [ 'id'=> 9, 'name_en'=> "Australia", 'name_tm'=> "Awstraliýa", 'name_ru'=> "Австралия" ],
  [ 'id'=> 10, 'name_en'=> "Austria", 'name_tm'=> "Awstriýa", 'name_ru'=> "Австрия" ],
  [ 'id'=> 11, 'name_en'=> "Azerbaijan", 'name_tm'=> "Azerbaýjan", 'name_ru'=> "Азербайджан" ],
  [ 'id'=> 12, 'name_en'=> "Bahamas", 'name_tm'=> "Bagama Adalary", 'name_ru'=> "Багамские Острова" ],
  [ 'id'=> 13, 'name_en'=> "Bahrain", 'name_tm'=> "Bahreýn", 'name_ru'=> "Бахрейн" ],
  [ 'id'=> 14, 'name_en'=> "Bangladesh", 'name_tm'=> "Bangladeş", 'name_ru'=> "Бангладеш" ],
  [ 'id'=> 15, 'name_en'=> "Barbados", 'name_tm'=> "Barbados", 'name_ru'=> "Барбадос" ],
  [ 'id'=> 16, 'name_en'=> "Belarus", 'name_tm'=> "Belarus", 'name_ru'=> "Беларусь" ],
  [ 'id'=> 17, 'name_en'=> "Belgium", 'name_tm'=> "Belgiýa", 'name_ru'=> "Бельгия" ],
  [ 'id'=> 18, 'name_en'=> "Belize", 'name_tm'=> "Beliz", 'name_ru'=> "Белиз" ],
  [ 'id'=> 19, 'name_en'=> "Benin", 'name_tm'=> "Benin", 'name_ru'=> "Бенин" ],
  [ 'id'=> 20, 'name_en'=> "Bhutan", 'name_tm'=> "Butan", 'name_ru'=> "Бутан" ],
  [ 'id'=> 21, 'name_en'=> "Bolivia", 'name_tm'=> "Boliwiýa", 'name_ru'=> "Боливия" ],
  [ 'id'=> 22, 'name_en'=> "Bosnia and Herzegovina", 'name_tm'=> "Bosniýa we Gersegowina", 'name_ru'=> "Босния и Герцеговина" ],
  [ 'id'=> 23, 'name_en'=> "Botswana", 'name_tm'=> "Botswana", 'name_ru'=> "Ботсвана" ],
  [ 'id'=> 24, 'name_en'=> "Brazil", 'name_tm'=> "Braziliýa", 'name_ru'=> "Бразилия" ],
  [ 'id'=> 25, 'name_en'=> "Brunei", 'name_tm'=> "Bruneý", 'name_ru'=> "Бруней" ],
  [ 'id'=> 26, 'name_en'=> "Bulgaria", 'name_tm'=> "Bolgariýa", 'name_ru'=> "Болгария" ],
  [ 'id'=> 27, 'name_en'=> "Burkina Faso", 'name_tm'=> "Burkina-Faso", 'name_ru'=> "Буркина-Фасо" ],
  [ 'id'=> 28, 'name_en'=> "Burundi", 'name_tm'=> "Burundi", 'name_ru'=> "Бурунди" ],
  [ 'id'=> 29, 'name_en'=> "Cabo Verde", 'name_tm'=> "Kabo-Werde", 'name_ru'=> "Кабо-Верде" ],
  [ 'id'=> 30, 'name_en'=> "Cambodia", 'name_tm'=> "Kambodža", 'name_ru'=> "Камбоджа" ],
  [ 'id'=> 31, 'name_en'=> "Cameroon", 'name_tm'=> "Kamerun", 'name_ru'=> "Камерун" ],
  [ 'id'=> 32, 'name_en'=> "Canada", 'name_tm'=> "Kanada", 'name_ru'=> "Канада" ],
  [ 'id'=> 33, 'name_en'=> "Central African Republic", 'name_tm'=> "Merkezi Afrika Respublikasy", 'name_ru'=> "Центральноафриканская Республика" ],
  [ 'id'=> 34, 'name_en'=> "Chad", 'name_tm'=> "Çad", 'name_ru'=> "Чад" ],
  [ 'id'=> 35, 'name_en'=> "Chile", 'name_tm'=> "Çili", 'name_ru'=> "Чили" ],
  [ 'id'=> 36, 'name_en'=> "China", 'name_tm'=> "Hytaý", 'name_ru'=> "Китай" ],
  [ 'id'=> 37, 'name_en'=> "Colombia", 'name_tm'=> "Kolumbiýa", 'name_ru'=> "Колумбия" ],
  [ 'id'=> 38, 'name_en'=> "Comoros", 'name_tm'=> "Komor Adalary", 'name_ru'=> "Коморы" ],
  [ 'id'=> 39, 'name_en'=> "Congo, Democratic Republic of the", 'name_tm'=> "Kongo Demokratik Respublikasy", 'name_ru'=> "Демократическая Республика Конго" ],
  [ 'id'=> 40, 'name_en'=> "Congo, Republic of the", 'name_tm'=> "Kongo Respublikasy", 'name_ru'=> "Республика Конго" ],
  [ 'id'=> 41, 'name_en'=> "Costa Rica", 'name_tm'=> "Kosta-Rika", 'name_ru'=> "Коста-Рика" ],
  [ 'id'=> 42, 'name_en'=> "Côte d'Ivoire", 'name_tm'=> "Kot-d'Iwuar", 'name_ru'=> "Кот-д’Ивуар" ],
  [ 'id'=> 43, 'name_en'=> "Croatia", 'name_tm'=> "Horwatiýa", 'name_ru'=> "Хорватия" ],
  [ 'id'=> 44, 'name_en'=> "Cuba", 'name_tm'=> "Kuba", 'name_ru'=> "Куба" ],
  [ 'id'=> 45, 'name_en'=> "Cyprus", 'name_tm'=> "Kipr", 'name_ru'=> "Кипр" ],
  [ 'id'=> 46, 'name_en'=> "Czechia", 'name_tm'=> "Çehiýa", 'name_ru'=> "Чехия" ],
  [ 'id'=> 47, 'name_en'=> "Denmark", 'name_tm'=> "Daniýa", 'name_ru'=> "Дания" ],
  [ 'id'=> 48, 'name_en'=> "Djibouti", 'name_tm'=> "Jibuti", 'name_ru'=> "Джибути" ],
  [ 'id'=> 49, 'name_en'=> "Dominica", 'name_tm'=> "Dominika", 'name_ru'=> "Доминика" ],
  [ 'id'=> 50, 'name_en'=> "Dominican Republic", 'name_tm'=> "Dominikan Respublikasy", 'name_ru'=> "Доминиканская Республика" ],
  [ 'id'=> 51, 'name_en'=> "Ecuador", 'name_tm'=> "Ekwador", 'name_ru'=> "Эквадор" ],
  [ 'id'=> 52, 'name_en'=> "Egypt", 'name_tm'=> "Müsür", 'name_ru'=> "Египет" ],
  [ 'id'=> 53, 'name_en'=> "El Salvador", 'name_tm'=> "Salwador", 'name_ru'=> "Сальвадор" ],
  [ 'id'=> 54, 'name_en'=> "Equatorial Guinea", 'name_tm'=> "Ekwatorial Gwineýa", 'name_ru'=> "Экваториальная Гвинея" ],
  [ 'id'=> 55, 'name_en'=> "Eritrea", 'name_tm'=> "Eritreýa", 'name_ru'=> "Эритрея" ],
  [ 'id'=> 56, 'name_en'=> "Estonia", 'name_tm'=> "Estoniýa", 'name_ru'=> "Эстония" ],
  [ 'id'=> 57, 'name_en'=> "Eswatini", 'name_tm'=> "Eswatini", 'name_ru'=> "Эсватини" ],
  [ 'id'=> 58, 'name_en'=> "Ethiopia", 'name_tm'=> "Efiopiýa", 'name_ru'=> "Эфиопия" ],
  [ 'id'=> 59, 'name_en'=> "Fiji", 'name_tm'=> "Fiji", 'name_ru'=> "Фиджи" ],
  [ 'id'=> 60, 'name_en'=> "Finland", 'name_tm'=> "Finlýandiýa", 'name_ru'=> "Финляндия" ],
  [ 'id'=> 61, 'name_en'=> "France", 'name_tm'=> "Fransiýa", 'name_ru'=> "Франция" ],
  [ 'id'=> 62, 'name_en'=> "Gabon", 'name_tm'=> "Gabon", 'name_ru'=> "Габон" ],
  [ 'id'=> 63, 'name_en'=> "Gambia", 'name_tm'=> "Gambiýa", 'name_ru'=> "Гамбия" ],
  [ 'id'=> 64, 'name_en'=> "Georgia", 'name_tm'=> "Gruziýa", 'name_ru'=> "Грузия" ],
  [ 'id'=> 65, 'name_en'=> "Germany", 'name_tm'=> "Germaniýa", 'name_ru'=> "Германия" ],
  [ 'id'=> 66, 'name_en'=> "Ghana", 'name_tm'=> "Gana", 'name_ru'=> "Гана" ],
  [ 'id'=> 67, 'name_en'=> "Greece", 'name_tm'=> "Gresiýa", 'name_ru'=> "Греция" ],
  [ 'id'=> 68, 'name_en'=> "Grenada", 'name_tm'=> "Grenada", 'name_ru'=> "Гренада" ],
  [ 'id'=> 69, 'name_en'=> "Guatemala", 'name_tm'=> "Gwatemala", 'name_ru'=> "Гватемала" ],
  [ 'id'=> 70, 'name_en'=> "Guinea", 'name_tm'=> "Gwineýa", 'name_ru'=> "Гвинея" ],
  [ 'id'=> 71, 'name_en'=> "Guinea-Bissau", 'name_tm'=> "Gwineýa-Bisau", 'name_ru'=> "Гвинея-Бисау" ],
  [ 'id'=> 72, 'name_en'=> "Guyana", 'name_tm'=> "Gaýana", 'name_ru'=> "Гайана" ],
  [ 'id'=> 73, 'name_en'=> "Haiti", 'name_tm'=> "Gaiti", 'name_ru'=> "Гаити" ],
  [ 'id'=> 74, 'name_en'=> "Honduras", 'name_tm'=> "Gonduras", 'name_ru'=> "Гондурас" ],
  [ 'id'=> 75, 'name_en'=> "Hungary", 'name_tm'=> "Wengriýa", 'name_ru'=> "Венгрия" ],
  [ 'id'=> 76, 'name_en'=> "Iceland", 'name_tm'=> "Islandiýa", 'name_ru'=> "Исландия" ],
  [ 'id'=> 77, 'name_en'=> "India", 'name_tm'=> "Hindistan", 'name_ru'=> "Индия" ],
  [ 'id'=> 78, 'name_en'=> "Indonesia", 'name_tm'=> "Indoneziýa", 'name_ru'=> "Индонезия" ],
  [ 'id'=> 79, 'name_en'=> "Iran", 'name_tm'=> "Eýran", 'name_ru'=> "Иран" ],
  [ 'id'=> 80, 'name_en'=> "Iraq", 'name_tm'=> "Yrak", 'name_ru'=> "Ирак" ],
  [ 'id'=> 81, 'name_en'=> "Ireland", 'name_tm'=> "Irlandiýa", 'name_ru'=> "Ирландия" ],
  [ 'id'=> 82, 'name_en'=> "Israel", 'name_tm'=> "Ysraýyl", 'name_ru'=> "Израиль" ],
  [ 'id'=> 83, 'name_en'=> "Italy", 'name_tm'=> "Italiýa", 'name_ru'=> "Италия" ],
  [ 'id'=> 84, 'name_en'=> "Jamaica", 'name_tm'=> "Ýamaýka", 'name_ru'=> "Ямайка" ],
  [ 'id'=> 85, 'name_en'=> "Japan", 'name_tm'=> "Ýaponiýa", 'name_ru'=> "Япония" ],
  [ 'id'=> 86, 'name_en'=> "Jordan", 'name_tm'=> "Iordaniýa", 'name_ru'=> "Иордания" ],
  [ 'id'=> 87, 'name_en'=> "Kazakhstan", 'name_tm'=> "Gazagystan", 'name_ru'=> "Казахстан" ],
  [ 'id'=> 88, 'name_en'=> "Kenya", 'name_tm'=> "Keniýa", 'name_ru'=> "Кения" ],
  [ 'id'=> 89, 'name_en'=> "Kiribati", 'name_tm'=> "Kiribati", 'name_ru'=> "Кирибати" ],
  [ 'id'=> 90, 'name_en'=> "Korea, North", 'name_tm'=> "Demirgazyk Koreýa", 'name_ru'=> "Северная Корея" ],
  [ 'id'=> 91, 'name_en'=> "Korea, South", 'name_tm'=> "Günorta Koreýa", 'name_ru'=> "Южная Корея" ],
  [ 'id'=> 92, 'name_en'=> "Kuwait", 'name_tm'=> "Kuweýt", 'name_ru'=> "Кувейт" ],
  [ 'id'=> 93, 'name_en'=> "Kyrgyzstan", 'name_tm'=> "Gyrgyzystan", 'name_ru'=> "Кыргызстан" ],
  [ 'id'=> 94, 'name_en'=> "Laos", 'name_tm'=> "Laos", 'name_ru'=> "Лаос" ],
  [ 'id'=> 95, 'name_en'=> "Latvia", 'name_tm'=> "Latwiýa", 'name_ru'=> "Латвия" ],
  [ 'id'=> 96, 'name_en'=> "Lebanon", 'name_tm'=> "Liwan", 'name_ru'=> "Ливан" ],
  [ 'id'=> 97, 'name_en'=> "Lesotho", 'name_tm'=> "Lesoto", 'name_ru'=> "Лесото" ],
  [ 'id'=> 98, 'name_en'=> "Liberia", 'name_tm'=> "Liberiýa", 'name_ru'=> "Либерия" ],
  [ 'id'=> 99, 'name_en'=> "Libya", 'name_tm'=> "Liwiýa", 'name_ru'=> "Ливия" ],
  [ 'id'=> 100, 'name_en'=> "Liechtenstein", 'name_tm'=> "Lihtenşteýn", 'name_ru'=> "Лихтенштейн" ],
  [ 'id'=> 101, 'name_en'=> "Lithuania", 'name_tm'=> "Litwa", 'name_ru'=> "Литва" ],
  [ 'id'=> 102, 'name_en'=> "Luxembourg", 'name_tm'=> "Lýuksemburg", 'name_ru'=> "Люксембург" ],
  [ 'id'=> 103, 'name_en'=> "Madagascar", 'name_tm'=> "Madagaskar", 'name_ru'=> "Мадагаскар" ],
  [ 'id'=> 104, 'name_en'=> "Malawi", 'name_tm'=> "Malawi", 'name_ru'=> "Малави" ],
  [ 'id'=> 105, 'name_en'=> "Malaysia", 'name_tm'=> "Malaýziýa", 'name_ru'=> "Малайзия" ],
  [ 'id'=> 106, 'name_en'=> "Maldives", 'name_tm'=> "Maldiwler", 'name_ru'=> "Мальдивы" ],
  [ 'id'=> 107, 'name_en'=> "Mali", 'name_tm'=> "Mali", 'name_ru'=> "Мали" ],
  [ 'id'=> 108, 'name_en'=> "Malta", 'name_tm'=> "Malta", 'name_ru'=> "Мальта" ],
  [ 'id'=> 109, 'name_en'=> "Marshall Islands", 'name_tm'=> "Marşall Adalary", 'name_ru'=> "Маршалловы Острова" ],
  [ 'id'=> 110, 'name_en'=> "Mauritania", 'name_tm'=> "Mawritaniýa", 'name_ru'=> "Мавритания" ],
  [ 'id'=> 111, 'name_en'=> "Mauritius", 'name_tm'=> "Mawrikiý", 'name_ru'=> "Маврикий" ],
  [ 'id'=> 112, 'name_en'=> "Mexico", 'name_tm'=> "Meksika", 'name_ru'=> "Мексика" ],
  [ 'id'=> 113, 'name_en'=> "Micronesia", 'name_tm'=> "Mikroneziýa", 'name_ru'=> "Микронезия" ],
  [ 'id'=> 114, 'name_en'=> "Moldova", 'name_tm'=> "Moldowa", 'name_ru'=> "Молдова" ],
  [ 'id'=> 115, 'name_en'=> "Monaco", 'name_tm'=> "Monako", 'name_ru'=> "Монако" ],
  [ 'id'=> 116, 'name_en'=> "Mongolia", 'name_tm'=> "Mongoliýa", 'name_ru'=> "Монголия" ],
  [ 'id'=> 117, 'name_en'=> "Montenegro", 'name_tm'=> "Çernogoriýa", 'name_ru'=> "Черногория" ],
  [ 'id'=> 118, 'name_en'=> "Morocco", 'name_tm'=> "Marokko", 'name_ru'=> "Марокко" ],
  [ 'id'=> 119, 'name_en'=> "Mozambique", 'name_tm'=> "Mozambik", 'name_ru'=> "Мозамбик" ],
  [ 'id'=> 120, 'name_en'=> "Myanmar", 'name_tm'=> "Mýanma", 'name_ru'=> "Мьянма" ],
  [ 'id'=> 121, 'name_en'=> "Namibia", 'name_tm'=> "Namibiýa", 'name_ru'=> "Намибия" ],
  [ 'id'=> 122, 'name_en'=> "Nauru", 'name_tm'=> "Nauru", 'name_ru'=> "Науру" ],
  [ 'id'=> 123, 'name_en'=> "Nepal", 'name_tm'=> "Nepal", 'name_ru'=> "Непал" ],
  [ 'id'=> 124, 'name_en'=> "Netherlands", 'name_tm'=> "Niderlandlar", 'name_ru'=> "Нидерланды" ],
  [ 'id'=> 125, 'name_en'=> "New Zealand", 'name_tm'=> "Täze Zelandiýa", 'name_ru'=> "Новая Зеландия" ],
  [ 'id'=> 126, 'name_en'=> "Nicaragua", 'name_tm'=> "Nikaragua", 'name_ru'=> "Никарагуа" ],
  [ 'id'=> 127, 'name_en'=> "Niger", 'name_tm'=> "Niger", 'name_ru'=> "Нигер" ],
  [ 'id'=> 128, 'name_en'=> "Nigeria", 'name_tm'=> "Nigeriýa", 'name_ru'=> "Нигерия" ],
  [ 'id'=> 129, 'name_en'=> "North Macedonia", 'name_tm'=> "Demirgazyk Makedoniýa", 'name_ru'=> "Северная Македония" ],
  [ 'id'=> 130, 'name_en'=> "Norway", 'name_tm'=> "Norwegiýa", 'name_ru'=> "Норвегия" ],
  [ 'id'=> 131, 'name_en'=> "Oman", 'name_tm'=> "Oman", 'name_ru'=> "Оман" ],
  [ 'id'=> 132, 'name_en'=> "Pakistan", 'name_tm'=> "Pakistan", 'name_ru'=> "Пакистан" ],
  [ 'id'=> 133, 'name_en'=> "Palau", 'name_tm'=> "Palau", 'name_ru'=> "Палау" ],
  [ 'id'=> 134, 'name_en'=> "Panama", 'name_tm'=> "Panama", 'name_ru'=> "Панама" ],
  [ 'id'=> 135, 'name_en'=> "Papua New Guinea", 'name_tm'=> "Papua Täze Gwineýa", 'name_ru'=> "Папуа — Новая Гвинея" ],
  [ 'id'=> 136, 'name_en'=> "Paraguay", 'name_tm'=> "Paragwaý", 'name_ru'=> "Парагвай" ],
  [ 'id'=> 137, 'name_en'=> "Peru", 'name_tm'=> "Peru", 'name_ru'=> "Перу" ],
  [ 'id'=> 138, 'name_en'=> "Philippines", 'name_tm'=> "Filippinler", 'name_ru'=> "Филиппины" ],
  [ 'id'=> 139, 'name_en'=> "Poland", 'name_tm'=> "Polşa", 'name_ru'=> "Польша" ],
  [ 'id'=> 140, 'name_en'=> "Portugal", 'name_tm'=> "Portugaliýa", 'name_ru'=> "Португалия" ],
  [ 'id'=> 141, 'name_en'=> "Qatar", 'name_tm'=> "Katar", 'name_ru'=> "Катар" ],
  [ 'id'=> 142, 'name_en'=> "Romania", 'name_tm'=> "Rumyniýa", 'name_ru'=> "Румыния" ],
  [ 'id'=> 143, 'name_en'=> "Russia", 'name_tm'=> "Russiýa", 'name_ru'=> "Россия" ],
  [ 'id'=> 144, 'name_en'=> "Rwanda", 'name_tm'=> "Ruanda", 'name_ru'=> "Руанда" ],
  [ 'id'=> 145, 'name_en'=> "Saint Kitts and Nevis", 'name_tm'=> "Sent-Kits we Newis", 'name_ru'=> "Сент-Китс и Невис" ],
  [ 'id'=> 146, 'name_en'=> "Saint Lucia", 'name_tm'=> "Sent-Lýusiýa", 'name_ru'=> "Сент-Люсия" ],
  [ 'id'=> 147, 'name_en'=> "Saint Vincent and the Grenadines", 'name_tm'=> "Sent-Winsent we Grenadinler", 'name_ru'=> "Сент-Винсент и Гренадины" ],
  [ 'id'=> 148, 'name_en'=> "Samoa", 'name_tm'=> "Samoa", 'name_ru'=> "Самоа" ],
  [ 'id'=> 149, 'name_en'=> "San Marino", 'name_tm'=> "San-Marino", 'name_ru'=> "Сан-Марино" ],
  [ 'id'=> 150, 'name_en'=> "Sao Tome and Principe", 'name_tm'=> "San-Tome we Prinsipi", 'name_ru'=> "Сан-Томе и Принсипи" ],
  [ 'id'=> 151, 'name_en'=> "Saudi Arabia", 'name_tm'=> "Saud Arabystany", 'name_ru'=> "Саудовская Аравия" ],
  [ 'id'=> 152, 'name_en'=> "Senegal", 'name_tm'=> "Senegal", 'name_ru'=> "Сенегал" ],
  [ 'id'=> 153, 'name_en'=> "Serbia", 'name_tm'=> "Serbiýa", 'name_ru'=> "Сербия" ],
  [ 'id'=> 154, 'name_en'=> "Seychelles", 'name_tm'=> "Seýşel Adalary", 'name_ru'=> "Сейшельские Острова" ],
  [ 'id'=> 155, 'name_en'=> "Sierra Leone", 'name_tm'=> "Sierra-Leone", 'name_ru'=> "Сьерра-Леоне" ],
  [ 'id'=> 156, 'name_en'=> "Singapore", 'name_tm'=> "Singapur", 'name_ru'=> "Сингапур" ],
  [ 'id'=> 157, 'name_en'=> "Slovakia", 'name_tm'=> "Slowakiýa", 'name_ru'=> "Словакия" ],
  [ 'id'=> 158, 'name_en'=> "Slovenia", 'name_tm'=> "Sloweniýa", 'name_ru'=> "Словения" ],
  [ 'id'=> 159, 'name_en'=> "Solomon Islands", 'name_tm'=> "Solomon Adalary", 'name_ru'=> "Соломоновы Острова" ],
  [ 'id'=> 160, 'name_en'=> "Somalia", 'name_tm'=> "Somali", 'name_ru'=> "Сомали" ],
  [ 'id'=> 161, 'name_en'=> "South Africa", 'name_tm'=> "Günorta Afrika Respublikasy", 'name_ru'=> "Южно-Африканская Республика" ],
  [ 'id'=> 162, 'name_en'=> "South Sudan", 'name_tm'=> "Günorta Sudan", 'name_ru'=> "Южный Судан" ],
  [ 'id'=> 163, 'name_en'=> "Spain", 'name_tm'=> "Ispaniýa", 'name_ru'=> "Испания" ],
  [ 'id'=> 164, 'name_en'=> "Sri Lanka", 'name_tm'=> "Şri-Lanka", 'name_ru'=> "Шри-Ланка" ],
  [ 'id'=> 165, 'name_en'=> "Sudan", 'name_tm'=> "Sudan", 'name_ru'=> "Судан" ],
  [ 'id'=> 166, 'name_en'=> "Suriname", 'name_tm'=> "Surinam", 'name_ru'=> "Суринам" ],
  [ 'id'=> 167, 'name_en'=> "Sweden", 'name_tm'=> "Şwesiýa", 'name_ru'=> "Швеция" ],
  [ 'id'=> 168, 'name_en'=> "Switzerland", 'name_tm'=> "Şweýsariýa", 'name_ru'=> "Швейцария" ],
  [ 'id'=> 169, 'name_en'=> "Syria", 'name_tm'=> "Siriýa", 'name_ru'=> "Сирия" ],
  [ 'id'=> 170, 'name_en'=> "Tajikistan", 'name_tm'=> "Täjigistan", 'name_ru'=> "Таджикистан" ],
  [ 'id'=> 171, 'name_en'=> "Tanzania", 'name_tm'=> "Tanzaniýa", 'name_ru'=> "Танзания" ],
  [ 'id'=> 172, 'name_en'=> "Thailand", 'name_tm'=> "Taýland", 'name_ru'=> "Таиланд" ],
  [ 'id'=> 173, 'name_en'=> "Timor-Leste", 'name_tm'=> "Timor-Leste", 'name_ru'=> "Восточный Тимор" ],
  [ 'id'=> 174, 'name_en'=> "Togo", 'name_tm'=> "Togo", 'name_ru'=> "Того" ],
  [ 'id'=> 175, 'name_en'=> "Tonga", 'name_tm'=> "Tonga", 'name_ru'=> "Тонга" ],
  [ 'id'=> 176, 'name_en'=> "Trinidad and Tobago", 'name_tm'=> "Trinidad we Tobago", 'name_ru'=> "Тринидад и Тобаго" ],
  [ 'id'=> 177, 'name_en'=> "Tunisia", 'name_tm'=> "Tunis", 'name_ru'=> "Тунис" ],
  [ 'id'=> 178, 'name_en'=> "Turkey", 'name_tm'=> "Türkiýe", 'name_ru'=> "Турция" ],
  [ 'id'=> 179, 'name_en'=> "Turkmenistan", 'name_tm'=> "Türkmenistan", 'name_ru'=> "Туркменистан" ],
  [ 'id'=> 180, 'name_en'=> "Tuvalu", 'name_tm'=> "Tuwalu", 'name_ru'=> "Тувалу" ],
  [ 'id'=> 181, 'name_en'=> "Uganda", 'name_tm'=> "Uganda", 'name_ru'=> "Уганда" ],
  [ 'id'=> 182, 'name_en'=> "Ukraine", 'name_tm'=> "Ukraina", 'name_ru'=> "Украина" ],
  [ 'id'=> 183, 'name_en'=> "United Arab Emirates", 'name_tm'=> "Birleşen Arap Emirlikleri", 'name_ru'=> "Объединённые Арабские Эмираты" ],
  [ 'id'=> 184, 'name_en'=> "United Kingdom", 'name_tm'=> "Beýik Britaniýa", 'name_ru'=> "Великобритания" ],
  [ 'id'=> 185, 'name_en'=> "United States", 'name_tm'=> "Amerikanyň Birleşen Ştatlary", 'name_ru'=> "Соединённые Штаты Америки" ],
  [ 'id'=> 186, 'name_en'=> "Uruguay", 'name_tm'=> "Urugwaý", 'name_ru'=> "Уругвай" ],
  [ 'id'=> 187, 'name_en'=> "Uzbekistan", 'name_tm'=> "Özbegistan", 'name_ru'=> "Узбекистан" ],
  [ 'id'=> 188, 'name_en'=> "Vanuatu", 'name_tm'=> "Wanuatu", 'name_ru'=> "Вануату" ],
  [ 'id'=> 189, 'name_en'=> "Vatican City", 'name_tm'=> "Watikan", 'name_ru'=> "Ватикан" ],
  [ 'id'=> 190, 'name_en'=> "Venezuela", 'name_tm'=> "Wenesuela", 'name_ru'=> "Венесуэла" ],
  [ 'id'=> 191, 'name_en'=> "Vietnam", 'name_tm'=> "Wýetnam", 'name_ru'=> "Вьетнам" ],
  [ 'id'=> 192, 'name_en'=> "Yemen", 'name_tm'=> "Ýemen", 'name_ru'=> "Йемен" ],
  [ 'id'=> 193, 'name_en'=> "Zambia", 'name_tm'=> "Zambiýa", 'name_ru'=> "Замбия" ],
  [ 'id'=> 194, 'name_en'=> "Zimbabwe", 'name_tm'=> "Zimbabwe", 'name_ru'=> "Зимбабве"],
];
    }

    public static function getCountryName($id)
    {
        $countries = [
            [ 'id'=> 1, 'name_en'=> "Afghanistan", 'name_tm'=> "Owganystan", 'name_ru'=> "Афганистан" ],
            [ 'id'=> 2, 'name_en'=> "Albania", 'name_tm'=> "Albaniýa", 'name_ru'=> "Албания" ],
            [ 'id'=> 3, 'name_en'=> "Algeria", 'name_tm'=> "Alžir", 'name_ru'=> "Алжир" ],
            [ 'id'=> 4, 'name_en'=> "Andorra", 'name_tm'=> "Andorra", 'name_ru'=> "Андорра" ],
            [ 'id'=> 5, 'name_en'=> "Angola", 'name_tm'=> "Angola", 'name_ru'=> "Ангола" ],
            [ 'id'=> 6, 'name_en'=> "Antigua and Barbuda", 'name_tm'=> "Antigua we Barbuda", 'name_ru'=> "Антигуа и Барбуда" ],
            [ 'id'=> 7, 'name_en'=> "Argentina", 'name_tm'=> "Argentina", 'name_ru'=> "Аргентина" ],
            [ 'id'=> 8, 'name_en'=> "Armenia", 'name_tm'=> "Ermenistan", 'name_ru'=> "Армения" ],
            [ 'id'=> 9, 'name_en'=> "Australia", 'name_tm'=> "Awstraliýa", 'name_ru'=> "Австралия" ],
            [ 'id'=> 10, 'name_en'=> "Austria", 'name_tm'=> "Awstriýa", 'name_ru'=> "Австрия" ],
            [ 'id'=> 11, 'name_en'=> "Azerbaijan", 'name_tm'=> "Azerbaýjan", 'name_ru'=> "Азербайджан" ],
            [ 'id'=> 12, 'name_en'=> "Bahamas", 'name_tm'=> "Bagama Adalary", 'name_ru'=> "Багамские Острова" ],
            [ 'id'=> 13, 'name_en'=> "Bahrain", 'name_tm'=> "Bahreýn", 'name_ru'=> "Бахрейн" ],
            [ 'id'=> 14, 'name_en'=> "Bangladesh", 'name_tm'=> "Bangladeş", 'name_ru'=> "Бангладеш" ],
            [ 'id'=> 15, 'name_en'=> "Barbados", 'name_tm'=> "Barbados", 'name_ru'=> "Барбадос" ],
            [ 'id'=> 16, 'name_en'=> "Belarus", 'name_tm'=> "Belarus", 'name_ru'=> "Беларусь" ],
            [ 'id'=> 17, 'name_en'=> "Belgium", 'name_tm'=> "Belgiýa", 'name_ru'=> "Бельгия" ],
            [ 'id'=> 18, 'name_en'=> "Belize", 'name_tm'=> "Beliz", 'name_ru'=> "Белиз" ],
            [ 'id'=> 19, 'name_en'=> "Benin", 'name_tm'=> "Benin", 'name_ru'=> "Бенин" ],
            [ 'id'=> 20, 'name_en'=> "Bhutan", 'name_tm'=> "Butan", 'name_ru'=> "Бутан" ],
            [ 'id'=> 21, 'name_en'=> "Bolivia", 'name_tm'=> "Boliwiýa", 'name_ru'=> "Боливия" ],
            [ 'id'=> 22, 'name_en'=> "Bosnia and Herzegovina", 'name_tm'=> "Bosniýa we Gersegowina", 'name_ru'=> "Босния и Герцеговина" ],
            [ 'id'=> 23, 'name_en'=> "Botswana", 'name_tm'=> "Botswana", 'name_ru'=> "Ботсвана" ],
            [ 'id'=> 24, 'name_en'=> "Brazil", 'name_tm'=> "Braziliýa", 'name_ru'=> "Бразилия" ],
            [ 'id'=> 25, 'name_en'=> "Brunei", 'name_tm'=> "Bruneý", 'name_ru'=> "Бруней" ],
            [ 'id'=> 26, 'name_en'=> "Bulgaria", 'name_tm'=> "Bolgariýa", 'name_ru'=> "Болгария" ],
            [ 'id'=> 27, 'name_en'=> "Burkina Faso", 'name_tm'=> "Burkina-Faso", 'name_ru'=> "Буркина-Фасо" ],
            [ 'id'=> 28, 'name_en'=> "Burundi", 'name_tm'=> "Burundi", 'name_ru'=> "Бурунди" ],
            [ 'id'=> 29, 'name_en'=> "Cabo Verde", 'name_tm'=> "Kabo-Werde", 'name_ru'=> "Кабо-Верде" ],
            [ 'id'=> 30, 'name_en'=> "Cambodia", 'name_tm'=> "Kambodža", 'name_ru'=> "Камбоджа" ],
            [ 'id'=> 31, 'name_en'=> "Cameroon", 'name_tm'=> "Kamerun", 'name_ru'=> "Камерун" ],
            [ 'id'=> 32, 'name_en'=> "Canada", 'name_tm'=> "Kanada", 'name_ru'=> "Канада" ],
            [ 'id'=> 33, 'name_en'=> "Central African Republic", 'name_tm'=> "Merkezi Afrika Respublikasy", 'name_ru'=> "Центральноафриканская Республика" ],
            [ 'id'=> 34, 'name_en'=> "Chad", 'name_tm'=> "Çad", 'name_ru'=> "Чад" ],
            [ 'id'=> 35, 'name_en'=> "Chile", 'name_tm'=> "Çili", 'name_ru'=> "Чили" ],
            [ 'id'=> 36, 'name_en'=> "China", 'name_tm'=> "Hytaý", 'name_ru'=> "Китай" ],
            [ 'id'=> 37, 'name_en'=> "Colombia", 'name_tm'=> "Kolumbiýa", 'name_ru'=> "Колумбия" ],
            [ 'id'=> 38, 'name_en'=> "Comoros", 'name_tm'=> "Komor Adalary", 'name_ru'=> "Коморы" ],
            [ 'id'=> 39, 'name_en'=> "Congo, Democratic Republic of the", 'name_tm'=> "Kongo Demokratik Respublikasy", 'name_ru'=> "Демократическая Республика Конго" ],
            [ 'id'=> 40, 'name_en'=> "Congo, Republic of the", 'name_tm'=> "Kongo Respublikasy", 'name_ru'=> "Республика Конго" ],
            [ 'id'=> 41, 'name_en'=> "Costa Rica", 'name_tm'=> "Kosta-Rika", 'name_ru'=> "Коста-Рика" ],
            [ 'id'=> 42, 'name_en'=> "Côte d'Ivoire", 'name_tm'=> "Kot-d'Iwuar", 'name_ru'=> "Кот-д’Ивуар" ],
            [ 'id'=> 43, 'name_en'=> "Croatia", 'name_tm'=> "Horwatiýa", 'name_ru'=> "Хорватия" ],
            [ 'id'=> 44, 'name_en'=> "Cuba", 'name_tm'=> "Kuba", 'name_ru'=> "Куба" ],
            [ 'id'=> 45, 'name_en'=> "Cyprus", 'name_tm'=> "Kipr", 'name_ru'=> "Кипр" ],
            [ 'id'=> 46, 'name_en'=> "Czechia", 'name_tm'=> "Çehiýa", 'name_ru'=> "Чехия" ],
            [ 'id'=> 47, 'name_en'=> "Denmark", 'name_tm'=> "Daniýa", 'name_ru'=> "Дания" ],
            [ 'id'=> 48, 'name_en'=> "Djibouti", 'name_tm'=> "Jibuti", 'name_ru'=> "Джибути" ],
            [ 'id'=> 49, 'name_en'=> "Dominica", 'name_tm'=> "Dominika", 'name_ru'=> "Доминика" ],
            [ 'id'=> 50, 'name_en'=> "Dominican Republic", 'name_tm'=> "Dominikan Respublikasy", 'name_ru'=> "Доминиканская Республика" ],
            [ 'id'=> 51, 'name_en'=> "Ecuador", 'name_tm'=> "Ekwador", 'name_ru'=> "Эквадор" ],
            [ 'id'=> 52, 'name_en'=> "Egypt", 'name_tm'=> "Müsür", 'name_ru'=> "Египет" ],
            [ 'id'=> 53, 'name_en'=> "El Salvador", 'name_tm'=> "Salwador", 'name_ru'=> "Сальвадор" ],
            [ 'id'=> 54, 'name_en'=> "Equatorial Guinea", 'name_tm'=> "Ekwatorial Gwineýa", 'name_ru'=> "Экваториальная Гвинея" ],
            [ 'id'=> 55, 'name_en'=> "Eritrea", 'name_tm'=> "Eritreýa", 'name_ru'=> "Эритрея" ],
            [ 'id'=> 56, 'name_en'=> "Estonia", 'name_tm'=> "Estoniýa", 'name_ru'=> "Эстония" ],
            [ 'id'=> 57, 'name_en'=> "Eswatini", 'name_tm'=> "Eswatini", 'name_ru'=> "Эсватини" ],
            [ 'id'=> 58, 'name_en'=> "Ethiopia", 'name_tm'=> "Efiopiýa", 'name_ru'=> "Эфиопия" ],
            [ 'id'=> 59, 'name_en'=> "Fiji", 'name_tm'=> "Fiji", 'name_ru'=> "Фиджи" ],
            [ 'id'=> 60, 'name_en'=> "Finland", 'name_tm'=> "Finlýandiýa", 'name_ru'=> "Финляндия" ],
            [ 'id'=> 61, 'name_en'=> "France", 'name_tm'=> "Fransiýa", 'name_ru'=> "Франция" ],
            [ 'id'=> 62, 'name_en'=> "Gabon", 'name_tm'=> "Gabon", 'name_ru'=> "Габон" ],
            [ 'id'=> 63, 'name_en'=> "Gambia", 'name_tm'=> "Gambiýa", 'name_ru'=> "Гамбия" ],
            [ 'id'=> 64, 'name_en'=> "Georgia", 'name_tm'=> "Gruziýa", 'name_ru'=> "Грузия" ],
            [ 'id'=> 65, 'name_en'=> "Germany", 'name_tm'=> "Germaniýa", 'name_ru'=> "Германия" ],
            [ 'id'=> 66, 'name_en'=> "Ghana", 'name_tm'=> "Gana", 'name_ru'=> "Гана" ],
            [ 'id'=> 67, 'name_en'=> "Greece", 'name_tm'=> "Gresiýa", 'name_ru'=> "Греция" ],
            [ 'id'=> 68, 'name_en'=> "Grenada", 'name_tm'=> "Grenada", 'name_ru'=> "Гренада" ],
            [ 'id'=> 69, 'name_en'=> "Guatemala", 'name_tm'=> "Gwatemala", 'name_ru'=> "Гватемала" ],
            [ 'id'=> 70, 'name_en'=> "Guinea", 'name_tm'=> "Gwineýa", 'name_ru'=> "Гвинея" ],
            [ 'id'=> 71, 'name_en'=> "Guinea-Bissau", 'name_tm'=> "Gwineýa-Bisau", 'name_ru'=> "Гвинея-Бисау" ],
            [ 'id'=> 72, 'name_en'=> "Guyana", 'name_tm'=> "Gaýana", 'name_ru'=> "Гайана" ],
            [ 'id'=> 73, 'name_en'=> "Haiti", 'name_tm'=> "Gaiti", 'name_ru'=> "Гаити" ],
            [ 'id'=> 74, 'name_en'=> "Honduras", 'name_tm'=> "Gonduras", 'name_ru'=> "Гондурас" ],
            [ 'id'=> 75, 'name_en'=> "Hungary", 'name_tm'=> "Wengriýa", 'name_ru'=> "Венгрия" ],
            [ 'id'=> 76, 'name_en'=> "Iceland", 'name_tm'=> "Islandiýa", 'name_ru'=> "Исландия" ],
            [ 'id'=> 77, 'name_en'=> "India", 'name_tm'=> "Hindistan", 'name_ru'=> "Индия" ],
            [ 'id'=> 78, 'name_en'=> "Indonesia", 'name_tm'=> "Indoneziýa", 'name_ru'=> "Индонезия" ],
            [ 'id'=> 79, 'name_en'=> "Iran", 'name_tm'=> "Eýran", 'name_ru'=> "Иран" ],
            [ 'id'=> 80, 'name_en'=> "Iraq", 'name_tm'=> "Yrak", 'name_ru'=> "Ирак" ],
            [ 'id'=> 81, 'name_en'=> "Ireland", 'name_tm'=> "Irlandiýa", 'name_ru'=> "Ирландия" ],
            [ 'id'=> 82, 'name_en'=> "Israel", 'name_tm'=> "Ysraýyl", 'name_ru'=> "Израиль" ],
            [ 'id'=> 83, 'name_en'=> "Italy", 'name_tm'=> "Italiýa", 'name_ru'=> "Италия" ],
            [ 'id'=> 84, 'name_en'=> "Jamaica", 'name_tm'=> "Ýamaýka", 'name_ru'=> "Ямайка" ],
            [ 'id'=> 85, 'name_en'=> "Japan", 'name_tm'=> "Ýaponiýa", 'name_ru'=> "Япония" ],
            [ 'id'=> 86, 'name_en'=> "Jordan", 'name_tm'=> "Iordaniýa", 'name_ru'=> "Иордания" ],
            [ 'id'=> 87, 'name_en'=> "Kazakhstan", 'name_tm'=> "Gazagystan", 'name_ru'=> "Казахстан" ],
            [ 'id'=> 88, 'name_en'=> "Kenya", 'name_tm'=> "Keniýa", 'name_ru'=> "Кения" ],
            [ 'id'=> 89, 'name_en'=> "Kiribati", 'name_tm'=> "Kiribati", 'name_ru'=> "Кирибати" ],
            [ 'id'=> 90, 'name_en'=> "Korea, North", 'name_tm'=> "Demirgazyk Koreýa", 'name_ru'=> "Северная Корея" ],
            [ 'id'=> 91, 'name_en'=> "Korea, South", 'name_tm'=> "Günorta Koreýa", 'name_ru'=> "Южная Корея" ],
            [ 'id'=> 92, 'name_en'=> "Kuwait", 'name_tm'=> "Kuweýt", 'name_ru'=> "Кувейт" ],
            [ 'id'=> 93, 'name_en'=> "Kyrgyzstan", 'name_tm'=> "Gyrgyzystan", 'name_ru'=> "Кыргызстан" ],
            [ 'id'=> 94, 'name_en'=> "Laos", 'name_tm'=> "Laos", 'name_ru'=> "Лаос" ],
            [ 'id'=> 95, 'name_en'=> "Latvia", 'name_tm'=> "Latwiýa", 'name_ru'=> "Латвия" ],
            [ 'id'=> 96, 'name_en'=> "Lebanon", 'name_tm'=> "Liwan", 'name_ru'=> "Ливан" ],
            [ 'id'=> 97, 'name_en'=> "Lesotho", 'name_tm'=> "Lesoto", 'name_ru'=> "Лесото" ],
            [ 'id'=> 98, 'name_en'=> "Liberia", 'name_tm'=> "Liberiýa", 'name_ru'=> "Либерия" ],
            [ 'id'=> 99, 'name_en'=> "Libya", 'name_tm'=> "Liwiýa", 'name_ru'=> "Ливия" ],
            [ 'id'=> 100, 'name_en'=> "Liechtenstein", 'name_tm'=> "Lihtenşteýn", 'name_ru'=> "Лихтенштейн" ],
            [ 'id'=> 101, 'name_en'=> "Lithuania", 'name_tm'=> "Litwa", 'name_ru'=> "Литва" ],
            [ 'id'=> 102, 'name_en'=> "Luxembourg", 'name_tm'=> "Lýuksemburg", 'name_ru'=> "Люксембург" ],
            [ 'id'=> 103, 'name_en'=> "Madagascar", 'name_tm'=> "Madagaskar", 'name_ru'=> "Мадагаскар" ],
            [ 'id'=> 104, 'name_en'=> "Malawi", 'name_tm'=> "Malawi", 'name_ru'=> "Малави" ],
            [ 'id'=> 105, 'name_en'=> "Malaysia", 'name_tm'=> "Malaýziýa", 'name_ru'=> "Малайзия" ],
            [ 'id'=> 106, 'name_en'=> "Maldives", 'name_tm'=> "Maldiwler", 'name_ru'=> "Мальдивы" ],
            [ 'id'=> 107, 'name_en'=> "Mali", 'name_tm'=> "Mali", 'name_ru'=> "Мали" ],
            [ 'id'=> 108, 'name_en'=> "Malta", 'name_tm'=> "Malta", 'name_ru'=> "Мальта" ],
            [ 'id'=> 109, 'name_en'=> "Marshall Islands", 'name_tm'=> "Marşall Adalary", 'name_ru'=> "Маршалловы Острова" ],
            [ 'id'=> 110, 'name_en'=> "Mauritania", 'name_tm'=> "Mawritaniýa", 'name_ru'=> "Мавритания" ],
            [ 'id'=> 111, 'name_en'=> "Mauritius", 'name_tm'=> "Mawrikiý", 'name_ru'=> "Маврикий" ],
            [ 'id'=> 112, 'name_en'=> "Mexico", 'name_tm'=> "Meksika", 'name_ru'=> "Мексика" ],
            [ 'id'=> 113, 'name_en'=> "Micronesia", 'name_tm'=> "Mikroneziýa", 'name_ru'=> "Микронезия" ],
            [ 'id'=> 114, 'name_en'=> "Moldova", 'name_tm'=> "Moldowa", 'name_ru'=> "Молдова" ],
            [ 'id'=> 115, 'name_en'=> "Monaco", 'name_tm'=> "Monako", 'name_ru'=> "Монако" ],
            [ 'id'=> 116, 'name_en'=> "Mongolia", 'name_tm'=> "Mongoliýa", 'name_ru'=> "Монголия" ],
            [ 'id'=> 117, 'name_en'=> "Montenegro", 'name_tm'=> "Çernogoriýa", 'name_ru'=> "Черногория" ],
            [ 'id'=> 118, 'name_en'=> "Morocco", 'name_tm'=> "Marokko", 'name_ru'=> "Марокко" ],
            [ 'id'=> 119, 'name_en'=> "Mozambique", 'name_tm'=> "Mozambik", 'name_ru'=> "Мозамбик" ],
            [ 'id'=> 120, 'name_en'=> "Myanmar", 'name_tm'=> "Mýanma", 'name_ru'=> "Мьянма" ],
            [ 'id'=> 121, 'name_en'=> "Namibia", 'name_tm'=> "Namibiýa", 'name_ru'=> "Намибия" ],
            [ 'id'=> 122, 'name_en'=> "Nauru", 'name_tm'=> "Nauru", 'name_ru'=> "Науру" ],
            [ 'id'=> 123, 'name_en'=> "Nepal", 'name_tm'=> "Nepal", 'name_ru'=> "Непал" ],
            [ 'id'=> 124, 'name_en'=> "Netherlands", 'name_tm'=> "Niderlandlar", 'name_ru'=> "Нидерланды" ],
            [ 'id'=> 125, 'name_en'=> "New Zealand", 'name_tm'=> "Täze Zelandiýa", 'name_ru'=> "Новая Зеландия" ],
            [ 'id'=> 126, 'name_en'=> "Nicaragua", 'name_tm'=> "Nikaragua", 'name_ru'=> "Никарагуа" ],
            [ 'id'=> 127, 'name_en'=> "Niger", 'name_tm'=> "Niger", 'name_ru'=> "Нигер" ],
            [ 'id'=> 128, 'name_en'=> "Nigeria", 'name_tm'=> "Nigeriýa", 'name_ru'=> "Нигерия" ],
            [ 'id'=> 129, 'name_en'=> "North Macedonia", 'name_tm'=> "Demirgazyk Makedoniýa", 'name_ru'=> "Северная Македония" ],
            [ 'id'=> 130, 'name_en'=> "Norway", 'name_tm'=> "Norwegiýa", 'name_ru'=> "Норвегия" ],
            [ 'id'=> 131, 'name_en'=> "Oman", 'name_tm'=> "Oman", 'name_ru'=> "Оман" ],
            [ 'id'=> 132, 'name_en'=> "Pakistan", 'name_tm'=> "Pakistan", 'name_ru'=> "Пакистан" ],
            [ 'id'=> 133, 'name_en'=> "Palau", 'name_tm'=> "Palau", 'name_ru'=> "Палау" ],
            [ 'id'=> 134, 'name_en'=> "Panama", 'name_tm'=> "Panama", 'name_ru'=> "Панама" ],
            [ 'id'=> 135, 'name_en'=> "Papua New Guinea", 'name_tm'=> "Papua Täze Gwineýa", 'name_ru'=> "Папуа — Новая Гвинея" ],
            [ 'id'=> 136, 'name_en'=> "Paraguay", 'name_tm'=> "Paragwaý", 'name_ru'=> "Парагвай" ],
            [ 'id'=> 137, 'name_en'=> "Peru", 'name_tm'=> "Peru", 'name_ru'=> "Перу" ],
            [ 'id'=> 138, 'name_en'=> "Philippines", 'name_tm'=> "Filippinler", 'name_ru'=> "Филиппины" ],
            [ 'id'=> 139, 'name_en'=> "Poland", 'name_tm'=> "Polşa", 'name_ru'=> "Польша" ],
            [ 'id'=> 140, 'name_en'=> "Portugal", 'name_tm'=> "Portugaliýa", 'name_ru'=> "Португалия" ],
            [ 'id'=> 141, 'name_en'=> "Qatar", 'name_tm'=> "Katar", 'name_ru'=> "Катар" ],
            [ 'id'=> 142, 'name_en'=> "Romania", 'name_tm'=> "Rumyniýa", 'name_ru'=> "Румыния" ],
            [ 'id'=> 143, 'name_en'=> "Russia", 'name_tm'=> "Russiýa", 'name_ru'=> "Россия" ],
            [ 'id'=> 144, 'name_en'=> "Rwanda", 'name_tm'=> "Ruanda", 'name_ru'=> "Руанда" ],
            [ 'id'=> 145, 'name_en'=> "Saint Kitts and Nevis", 'name_tm'=> "Sent-Kits we Newis", 'name_ru'=> "Сент-Китс и Невис" ],
            [ 'id'=> 146, 'name_en'=> "Saint Lucia", 'name_tm'=> "Sent-Lýusiýa", 'name_ru'=> "Сент-Люсия" ],
            [ 'id'=> 147, 'name_en'=> "Saint Vincent and the Grenadines", 'name_tm'=> "Sent-Winsent we Grenadinler", 'name_ru'=> "Сент-Винсент и Гренадины" ],
            [ 'id'=> 148, 'name_en'=> "Samoa", 'name_tm'=> "Samoa", 'name_ru'=> "Самоа" ],
            [ 'id'=> 149, 'name_en'=> "San Marino", 'name_tm'=> "San-Marino", 'name_ru'=> "Сан-Марино" ],
            [ 'id'=> 150, 'name_en'=> "Sao Tome and Principe", 'name_tm'=> "San-Tome we Prinsipi", 'name_ru'=> "Сан-Томе и Принсипи" ],
            [ 'id'=> 151, 'name_en'=> "Saudi Arabia", 'name_tm'=> "Saud Arabystany", 'name_ru'=> "Саудовская Аравия" ],
            [ 'id'=> 152, 'name_en'=> "Senegal", 'name_tm'=> "Senegal", 'name_ru'=> "Сенегал" ],
            [ 'id'=> 153, 'name_en'=> "Serbia", 'name_tm'=> "Serbiýa", 'name_ru'=> "Сербия" ],
            [ 'id'=> 154, 'name_en'=> "Seychelles", 'name_tm'=> "Seýşel Adalary", 'name_ru'=> "Сейшельские Острова" ],
            [ 'id'=> 155, 'name_en'=> "Sierra Leone", 'name_tm'=> "Sierra-Leone", 'name_ru'=> "Сьерра-Леоне" ],
            [ 'id'=> 156, 'name_en'=> "Singapore", 'name_tm'=> "Singapur", 'name_ru'=> "Сингапур" ],
            [ 'id'=> 157, 'name_en'=> "Slovakia", 'name_tm'=> "Slowakiýa", 'name_ru'=> "Словакия" ],
            [ 'id'=> 158, 'name_en'=> "Slovenia", 'name_tm'=> "Sloweniýa", 'name_ru'=> "Словения" ],
            [ 'id'=> 159, 'name_en'=> "Solomon Islands", 'name_tm'=> "Solomon Adalary", 'name_ru'=> "Соломоновы Острова" ],
            [ 'id'=> 160, 'name_en'=> "Somalia", 'name_tm'=> "Somali", 'name_ru'=> "Сомали" ],
            [ 'id'=> 161, 'name_en'=> "South Africa", 'name_tm'=> "Günorta Afrika Respublikasy", 'name_ru'=> "Южно-Африканская Республика" ],
            [ 'id'=> 162, 'name_en'=> "South Sudan", 'name_tm'=> "Günorta Sudan", 'name_ru'=> "Южный Судан" ],
            [ 'id'=> 163, 'name_en'=> "Spain", 'name_tm'=> "Ispaniýa", 'name_ru'=> "Испания" ],
            [ 'id'=> 164, 'name_en'=> "Sri Lanka", 'name_tm'=> "Şri-Lanka", 'name_ru'=> "Шри-Ланка" ],
            [ 'id'=> 165, 'name_en'=> "Sudan", 'name_tm'=> "Sudan", 'name_ru'=> "Судан" ],
            [ 'id'=> 166, 'name_en'=> "Suriname", 'name_tm'=> "Surinam", 'name_ru'=> "Суринам" ],
            [ 'id'=> 167, 'name_en'=> "Sweden", 'name_tm'=> "Şwesiýa", 'name_ru'=> "Швеция" ],
            [ 'id'=> 168, 'name_en'=> "Switzerland", 'name_tm'=> "Şweýsariýa", 'name_ru'=> "Швейцария" ],
            [ 'id'=> 169, 'name_en'=> "Syria", 'name_tm'=> "Siriýa", 'name_ru'=> "Сирия" ],
            [ 'id'=> 170, 'name_en'=> "Tajikistan", 'name_tm'=> "Täjigistan", 'name_ru'=> "Таджикистан" ],
            [ 'id'=> 171, 'name_en'=> "Tanzania", 'name_tm'=> "Tanzaniýa", 'name_ru'=> "Танзания" ],
            [ 'id'=> 172, 'name_en'=> "Thailand", 'name_tm'=> "Taýland", 'name_ru'=> "Таиланд" ],
            [ 'id'=> 173, 'name_en'=> "Timor-Leste", 'name_tm'=> "Timor-Leste", 'name_ru'=> "Восточный Тимор" ],
            [ 'id'=> 174, 'name_en'=> "Togo", 'name_tm'=> "Togo", 'name_ru'=> "Того" ],
            [ 'id'=> 175, 'name_en'=> "Tonga", 'name_tm'=> "Tonga", 'name_ru'=> "Тонга" ],
            [ 'id'=> 176, 'name_en'=> "Trinidad and Tobago", 'name_tm'=> "Trinidad we Tobago", 'name_ru'=> "Тринидад и Тобаго" ],
            [ 'id'=> 177, 'name_en'=> "Tunisia", 'name_tm'=> "Tunis", 'name_ru'=> "Тунис" ],
            [ 'id'=> 178, 'name_en'=> "Turkey", 'name_tm'=> "Türkiýe", 'name_ru'=> "Турция" ],
            [ 'id'=> 179, 'name_en'=> "Turkmenistan", 'name_tm'=> "Türkmenistan", 'name_ru'=> "Туркменистан" ],
            [ 'id'=> 180, 'name_en'=> "Tuvalu", 'name_tm'=> "Tuwalu", 'name_ru'=> "Тувалу" ],
            [ 'id'=> 181, 'name_en'=> "Uganda", 'name_tm'=> "Uganda", 'name_ru'=> "Уганда" ],
            [ 'id'=> 182, 'name_en'=> "Ukraine", 'name_tm'=> "Ukraina", 'name_ru'=> "Украина" ],
            [ 'id'=> 183, 'name_en'=> "United Arab Emirates", 'name_tm'=> "Birleşen Arap Emirlikleri", 'name_ru'=> "Объединённые Арабские Эмираты" ],
            [ 'id'=> 184, 'name_en'=> "United Kingdom", 'name_tm'=> "Beýik Britaniýa", 'name_ru'=> "Великобритания" ],
            [ 'id'=> 185, 'name_en'=> "United States", 'name_tm'=> "Amerikanyň Birleşen Ştatlary", 'name_ru'=> "Соединённые Штаты Америки" ],
            [ 'id'=> 186, 'name_en'=> "Uruguay", 'name_tm'=> "Urugwaý", 'name_ru'=> "Уругвай" ],
            [ 'id'=> 187, 'name_en'=> "Uzbekistan", 'name_tm'=> "Özbegistan", 'name_ru'=> "Узбекистан" ],
            [ 'id'=> 188, 'name_en'=> "Vanuatu", 'name_tm'=> "Wanuatu", 'name_ru'=> "Вануату" ],
            [ 'id'=> 189, 'name_en'=> "Vatican City", 'name_tm'=> "Watikan", 'name_ru'=> "Ватикан" ],
            [ 'id'=> 190, 'name_en'=> "Venezuela", 'name_tm'=> "Wenesuela", 'name_ru'=> "Венесуэла" ],
            [ 'id'=> 191, 'name_en'=> "Vietnam", 'name_tm'=> "Wýetnam", 'name_ru'=> "Вьетнам" ],
            [ 'id'=> 192, 'name_en'=> "Yemen", 'name_tm'=> "Ýemen", 'name_ru'=> "Йемен" ],
            [ 'id'=> 193, 'name_en'=> "Zambia", 'name_tm'=> "Zambiýa", 'name_ru'=> "Замбия" ],
            [ 'id'=> 194, 'name_en'=> "Zimbabwe", 'name_tm'=> "Zimbabwe", 'name_ru'=> "Зимбабве"],
        ];
        foreach ($countries as $country){
            if($country['id'] == $id){
                return $country['name_tm'];
            }
        }

    }

}