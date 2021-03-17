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

    protected $name;
    protected $address;
    protected $website;
    protected $email;
    protected $phoneNumber;
    protected $products = [];

    public function __construct(string $name, string $address, string $webSite, string $email, int $phoneNumber){
    
        $this->name = $name;
        $this->address = $address;
        $this->webSite = $webSite;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
    
    }

    public function getName(){
        return $this->name;
    }

    public function getAddress(){
        return $this->address;
    }

    public function getWebsite(){
        return $this->website;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPhoneNumber(){
        return $this->phoneNumber;
    }

    public function getProducts(){
        return $this->products;
    }

}

class User{

    protected $name;
    protected $lastname;
    protected $nickname;
    protected $id;
    protected $profileImg;
    protected $birthDate;
    protected $password;
    protected $primeClient = 'Si';
    protected $products = [];

    public function __construct(string $name, string $lastname, string $nickname, int $id, string $profileImg, string $birthDate, string $password){
    
        $this->name = $name;
        $this->lastname = $lastname;
        $this->nickname = $nickname;
        $this->id = $id;
        $this->profileImg = $profileImg;
        $this->birthDate = $birthDate;
        $this->password = $password;
    
    }

    public function getName(){
        return $this->name;
    }

    public function getLastName(){
        return $this->lastname;
    }

    public function getNickName(){
        return $this->nickname;
    }

    public function getId(){
        return $this->id;
    }

    public function getProfileImg(){
        return $this->profileImg;
    }

    public function getBirthDate(){
        return $this->birthDate;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getPrimeClient(){
        return $this->primeClient;
    }

    public function addProduct(Product $product){
        $this->products[] = $product;
    }

    public function getProducts(){
        return $this->products;
    }

}

class Product{

    protected $name;
    protected $price;
    protected $id;
    protected $category;
    protected $model;
    protected $material;
    protected $available = 'Non disponibile';
    protected $deliveryTime = '5 giorni lavorativi';

    public function __construct(string $name, int $price, int $id, string $category, string $model, string $material){
    
        $this->name = $name;
        $this->price = $price;
        $this->id = $id;
        $this->category = $category;
        $this->model = $model;
        $this->material = $material;
    
    }

    public function getName(){
        return $this->name;
    }

    public function getPrice(){
        return $this->price;
    }

    public function getId(){
        return $this->id;
    }

    public function getCategory(){
        return $this->category;
    }

    public function getModel(){
        return $this->model;
    }

    public function getSize(){
        return $this->size;
    }

    public function getMaterial(){
        return $this->material;
    }

    public function getAvailability(){
        return $this->available;
    }

    public function getDeliveryTime(){
        return $this->deliveryTime;
    }

}

class PC extends Product{

    protected $available = 'Disponibile';

    protected $deliveryTime = '2 giorni lavorativi';

}

class Console extends Product{

    protected $deliveryTime = 'Non disponibile';

}

class CreditCard{

    protected $cardHolder;
    protected $deliveryAddress;
    protected $cardNumber;
    protected $expirationDate;
    protected $securityCode;

    public function __construct(string $cardHolder, string $deliveryAddress, string $cardNumber, string $expirationDate, int $securityCode){
    
        $this->cardHolder = $cardHolder;
        $this->deliveryAddress = $deliveryAddress;
        $this->cardNumber = $cardNumber;
        $this->expirationDate = $expirationDate;
        $this->securityCode = $securityCode;
    
    }

    public function getCardHolder(){
        return $this->cardHolder;
    }

    public function getDeliveryAddress(){
        return $this->deliveryAddress;
    }

    public function getCardNumber(){
        return $this->cardNumber;
    }

    public function getExpirationDate(){
        return $this->expirationDate;
    }

    public function getSecurityCode(){
        return $this->securityCode;
    }

}

$shop = new Shop('Zalando', 'Valeska-Gert-Str. 5, 10243 Berlin', 'www.zalando.com', 'infoazienda@zalando.it', 0230300067);
$user = new User('Edoardo', 'Piragine', 'edopira', 23, 'profile.jpg', '22/06/1993', '***********');
$pc = new PC('HP 24"', 140, 254, 'PC', 'Monitor', 'Still & Plastic');
$console = new Console('Playstation 5', 500, 102, 'Videogaming', 'Console', 'Plastic');
$creditCard = new CreditCard('Edoardo Piragine', 'Via della Meloria, 5', '3427 4095 7504 ****', '2025/01/07', 829);
$user->addProduct($pc);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>OOP SHOP</title>
</head>
<body>

    <div class="container">

        <h1 class="title">OOP SHOP</h1>

        <h3 class="shop-details">Dati negozio</h3>

        <div class="shop-info">

            <span><span class="bold">Nome negozio:</span> <?php echo $shop->getName(); ?></span>
            <span><span class="bold">Indirizzo sede centrale:</span> <?php echo $shop->getAddress(); ?></span>
            <span><span class="bold">Sito web:</span> <?php echo $shop->getWebsite(); ?></span>
            <span><span class="bold">Email:</span> <?php echo $shop->getEmail(); ?></span>
            <span><span class="bold">Numero verde:</span> <?php echo $shop->getPhoneNumber(); ?></span>

        </div>

        <h3 class="shop-details">Prodotti selezionati</h3>

        <h4 class="product-num">Primo prodotto</h4>

        <div class="shop-info">

            <span><span class="bold">Categoria prodotto:</span> <?php echo $pc->getCategory(); ?></span>
            <span><span class="bold">Tipo prodotto:</span> <?php echo $pc->getModel(); ?></span>
            <span><span class="bold">Modello prodotto:</span> <?php echo $pc->getName(); ?></span>
            <span><span class="bold">Prezzo:</span> <?php echo $pc->getPrice(); ?>$</span>

        </div>

        <h4 class="product-num">Secondo prodotto</h4>

        <div class="shop-info">

            <span><span class="bold">Categoria prodotto:</span> <?php echo $console->getCategory(); ?></span>
            <span><span class="bold">Tipo prodotto:</span> <?php echo $console->getModel(); ?></span>
            <span><span class="bold">Modello prodotto:</span> <?php echo $console->getName(); ?></span>
            <span><span class="bold">Prezzo:</span> <?php echo $console->getPrice(); ?>$</span>

        </div>

        <h3 class="shop-details">Dati utente</h3>

        <div class="shop-info">

            <span><span class="bold">Nome:</span> <?php echo $user->getName(); ?></span>
            <span><span class="bold">Cognome:</span> <?php echo $user->getLastname(); ?></span>
            <span><span class="bold">ID:</span> <?php echo $user->getId(); ?></span>
            <span><span class="bold">Nickname:</span> <?php echo $user->getNickname(); ?></span>
            <span><span class="bold">Password:</span> <?php echo $user->getPassword(); ?></span>
            <span><span class="bold">Indirizzo spedizione:</span> <?php echo $creditCard->getDeliveryAddress(); ?></span>
            <span><span class="bold">Cliente PRIME:</span> <?php echo $user->getPrimeClient(); ?></span>

        </div>

        <h3 class="shop-details">Informazioni pagamento</h3>

        <div class="shop-info">

            <span><span class="bold">Numero carta di credito:</span> <?php echo $creditCard->getCardNumber(); ?></span>
            <span><span class="bold">Intestatario carta di credito:</span> <?php echo $creditCard->getCardHolder(); ?></span>
            <span><span class="bold">CVV:</span> <?php echo $creditCard->getSecurityCode(); ?></span>
            <span><span class="bold">Data di scadenza:</span> <?php echo $creditCard->getExpirationDate(); ?></span>

        </div>

        <h3 class="shop-details">Informazioni spedizione</h3>

        <div class="shop-info">

            <span><span class="bold">Indirizzo spedizione:</span> <?php echo $creditCard->getDeliveryAddress(); ?></span>
            <span><span class="bold">Tempi spedizione:</span> <?php echo $pc->getDeliveryTime(); ?></span>

        </div>

    </div>

</body>
</html>