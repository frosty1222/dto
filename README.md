# DTO
=> thực hành theo yêu cầu trong link: https://drive.google.com/file/d/1fpGVj1lmQSYyKCnZyDE1DurYfbEjcuUD/view?usp=sharing
### mục đích của bài
```
tìm hiểu về class, abstract class, trait, interfaces trong php và đặc biệt 
là hiểu được sự tương quan lẫn nhau giữa các class với trait và giữa class 
với interfaces và giữa abstract class với các interfaces, kết thúc bài thực hành này sẽ rút
ra được một kết luận về sự tương tác lẫn nhau và đặc điểm của từng thành phần class
trong OOP.

```
# Ví dụ
1. trong thư mục dto sẽ có file composer.json để dùng psr-4 để khai báo files sẽ được tự động load 
```php
 {
    "name": "oop_in_php/dto",
    "description": "description",
    "minimum-stability": "stable",
    "license": "d",
    "authors": [
      {
        "name": "dong",
        "email": "lovandong342@gmail.com"
      }
    ],
    "autoload": {
      "psr-4": {
        "src\\": "src/"
      }
    },
    "require": {
        "nesbot/carbon": "^2.62"
    },
    "require-dev": {
        "symfony/var-dumper": "^6.1"
    }
}
// symfony/var-dumper dùng package này để dump dữ liệu ra để xem hoặc fixed lỗi thay vì
dùng echo, print_r hay var_dump . dump sẽ cho một trải nghiệm view tốt hơn 
ngoài ra ta có thể dùng dd cũng tương tự dump
// sau khi đã khai báo với psr-4 xong thì ta chạy lệnh sau 
composer dump-autoload để execute nó
```
2. cấu trúc thư mục
```
//src
   /interfaces
   Book.php
   Datas.php
   HashAttibute.php
   User.php
//vendor
```
==> kết quả thu được sau bài này 
```
+ tiến hành khởi tạo 2 mảng Book, Và User
$bookArr =[
['name'=>'Book A','author'=>'Nguyen van A'],
['name'=>'Book B','author'=>'Nguyen van B']
];
$array=[
['name' => 'Nguyễn văn A', 'email' => 'A9@gmail.com'],
['name' => 'Wuan', 'email' => 'wuan@gmail.com'],
];

1.test User Class 

$user = new User();
$testU = $user::collection($array);
dump($testU->test());
dump($testU->all());
echo $user->test();
$user->name ="lò văn đồng";
$user->email = "lovandong342@gmail.com";
dump($user->name);
dump ($user->email);


2. Test Book Class


$book = new Book();
echo $book->test();
$testb = $book::collection($bookArr);
dump($testb->all());
dump($testb->last());// kết quả : array số 2
dump($testb->first());// kết quả :array số 1;
dump($testb->count($bookArr));
?>
```
### kết quả đạt được 
```
1. Kết quả sau khi chạy User Class
^ array:2 [▼
0 => src\User {#5 ▼
#original: []
#casts: []
-attributes: array:2 [▼
"name" => "Nguyễn văn A"
"email" => "A9@gmail.com"
]
}
1 => src\User {#6 ▼
#original: []
#casts: []
-attributes: array:2 [▼
"name" => "Wuan"
"email" => "wuan@gmail.com"
]
}
]
test function
^ null
^ array:2 [▼
"name" => "lò văn đồng"
"email" => "lovandong342@gmail.com"
]
^ array:2 [▼
"name" => "lò văn đồng"
"email" => "lovandong342@gmail.com"
]

2. kết quả sau khi chạy Book class

^ array:2 [▼
0 => src\Book {#15 ▼
#original: []
#casts: []
-attributes: array:2 [▼
"name" => "Book A"
"author" => "Nguyen van A"
]
}
1 => src\Book {#14 ▼
#original: []
#casts: []
-attributes: array:2 [▼
"name" => "Book B"
"author" => "Nguyen van B"
]
}
]
^ src\Book {#14 ▼
#original: []
#casts: []
-attributes: array:2 [▼
"name" => "Book B"
"author" => "Nguyen van B"
]
}
^ src\Book {#15 ▼
#original: []
#casts: []
-attributes: array:2 [▼
"name" => "Book A"
"author" => "Nguyen van A"
]
}
^ 2
```
