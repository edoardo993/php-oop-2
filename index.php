<!--

    Creare uno shop online.
    strutturare le classi gestendo l'ereditarietà dove necessario.
    provare a far interagire tra di loro gli oggetti (l'utente dello shop per esempio inserisce una carta di credito)
    $c = new CreditCard(..); 
    $user->insertCreditCard($c);
    BONUS: gestire le eccezioni. (es: carta di credito scaduta).

-->

<?php

class Shop{

    private $name;

    private $VATNumber;

    private $headquarter;

    private $email;

    public function __construct(string $name, string $VATNumber, string $headquarter, string $email){
    
        $this->name = $name;
        $this->VATNumber = $VATNumber;
        $this->headquarter = $headquarter;
        $this->email = $email;
    
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }

    public function getVATNumber(){
        return $this->VATNumber;
    }

    public function getHeadquarter(){
        return $this->headquarter;
    }

    public function getEmail(){
        return $this->email;
    }

}

class Product{

    protected $category;

    public function __construct(string $category){
    
        $this->category = $category;
    
    }

    public function getCategory(){
        return $this->category;
    }

}

class User{

    protected $name;

    protected $lastName;

    protected $id;

    protected $nickname;

    protected $password;
    
    public function __construct(string $name, string $lastName, int $id, string $nickname, string $password){
    
        $this->name = $name;
        $this->lastName = $lastName;
        $this->id = $id;
        $this->nickname = $nickname;
        $this->password = $password;
    
    }

    public function getName(){
        return $this->name;
    }

    public function getLastname(){
        return $this->lastName;
    }

    public function getId(){
        return $this->id;
    }

    public function getNickname(){
        return $this->nickname;
    }

    public function getPassword(){
        return $this->password;
    }

}

class CreditCard extends User{

    protected $creditCardNumber;

    protected $creditCardHolder;

    protected $securityNumber;

    protected $expirationDate;

    protected $expired = false;
    

    public function __construct(string $creditCardNumber, string $creditCardHolder, int $securityNumber, string $expirationDate){
    
        $this->creditCardNumber = $creditCardNumber;
        $this->creditCardHolder = $creditCardHolder;
        $this->securityNumber = $securityNumber;
        $this->expirationDate = $expirationDate;
    
    }

    public function getCard(){
        return $this->creditCardNumber;
    }

    public function getCreditCardHolder(){
        return $this->creditCardHolder;
    }

    public function getSecurityNumber(){
        return $this->securityNumber;
    }

    public function getExpirationDate(){
        return $this->expirationDate;
    }

}

$shop = new Shop('Zalando', '37/132/45004', 'Valeska-Gert-Str. 5, 10243 Berlin', 'infoazienda@zalando.it');
$product = new Product('Tech');
$user = new User('Edoardo', 'Piragine', 23, 'gnappo', 'zalando2020');
$creditCard = new CreditCard('7890 4782 3890 2617', 'Edoardo Piragine', 122, '2025/02/08');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>OOP</title>
</head>
<body>

    <div class="container">

        <h1 class="title">OOP SHOP</h1>

        <h3 class="shop-details">Dati negozio</h3>

        <div class="shop-info">

            <span><span class="bold">Nome negozio:</span> <?php echo $shop->getName(); ?></span>
            <span><span class="bold">Partita IVA:</span> <?php echo $shop->getVATNumber(); ?></span>
            <span><span class="bold">Indirizzo sede centrale:</span> <?php echo $shop->getHeadquarter(); ?></span>
            <span><span class="bold">Email:</span> <?php echo $shop->getEmail(); ?></span>

        </div>

        <h3 class="shop-details">Prodotto selezionato</h3>

        <div class="shop-info">

            <span><span class="bold">Categoria prodotto:</span> <?php echo $product->getCategory(); ?></span>

        </div>

        <h3 class="shop-details">Dati utente</h3>

        <div class="shop-info">

            <span><span class="bold">Nome:</span> <?php echo $user->getName(); ?></span>
            <span><span class="bold">Cognome:</span> <?php echo $user->getLastname(); ?></span>
            <span><span class="bold">ID:</span> <?php echo $user->getId(); ?></span>
            <span><span class="bold">Nickname:</span> <?php echo $user->getNickname(); ?></span>
            <span><span class="bold">Password:</span> <?php echo $user->getPassword(); ?></span>

        </div>

        <h3 class="shop-details">Informazioni Pagamento</h3>

        <div class="shop-info">

            <span><span class="bold">Numero carta di credito:</span> <?php echo $creditCard->getCard(); ?></span>
            <span><span class="bold">Intestatario carta di credito:</span> <?php echo $creditCard->getCreditCardHolder(); ?></span>
            <span><span class="bold">CVV:</span> <?php echo $creditCard->getSecurityNumber(); ?></span>
            <span><span class="bold">Data di scadenza:</span> <?php echo $creditCard->getExpirationDate(); ?></span>

        </div>

    </div>

</body>
</html>