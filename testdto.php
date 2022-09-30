<?php
require __DIR__.'/vendor/autoload.php';
include 'autoload.php';
use src\Book;
use src\User;
?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Dto</title>

        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <h1 class="text-center">Welcome to dto Test Area </h1>
        <?php
        echo "<h3 class='text-center'>test</h3>";
        $me =['name'=>'Lò Văn Đồng','email'=>'lovandong342@gmail.com'];
        $a =5;
        $b= 5;
        print_r($a +$b);
        // echo(Book::Test()->test());
        echo "<br/>";
        $bookArr =[
                ['name'=>'Book A','author'=>'Nguyen van A'],
                ['name'=>'Book B','author'=>'Nguyen van B']
        ];
        $array=[
            ['name' => 'Nguyễn Gia Hào', 'email' => 'giahao9899@gmail.com'],
            ['name' => 'VNP Group', 'email' => 'vnp@gmail.com'],
        ];
        echo "<h1 class='text-center'>test user</h1>";
       $user = new User();
       $testU = $user::collection($array);
       dump($testU->test());
       dump($testU->all());
        echo $user->test();
        $user->name ="lò văn đồng";
        $user->email = "lovandong342@gmail.com";
        dump($user->name);
        dump ($user->email);
        // book
        echo "<h1 class='text-center'>test book</h1>";
         $book = new Book();
         echo $book->test();
         $testb = $book::collection($bookArr);
         dump($testb->all());
         dump($testb->last());// kết quả : array số 2
         dump($testb->first());// kết quả :array số 1;
         dump($testb->count($bookArr));
        ?>
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
