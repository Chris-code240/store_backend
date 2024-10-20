<?php
include_once './Database.php';
class Product extends Database{

    protected $name;
    protected $sku;
    protected $price;
    protected $type;
    protected $weight;
    protected $size;
    protected $height;
    protected $width;
    protected $length;

    public function __construct( $data = []){

        foreach($data as $key => $value ){
            $this->$key = $value;
        }
		
		foreach($data['params'] as $key => $value){
			$this->$key = $value;
		}
    }

    public function get(){
        $query = 'SELECT * FROM '.$this->type.' ORDER BY ID ASC;';

        $stmt = $this->connect()->prepare($query);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $rows = $stmt->fetch();
        return $rows; 
    }

    public function add(){
        try {
            $queries = array('dvd'=>'INSERT INTO dvd (sku, name, price, size) VALUES(?,?,?,?);','book'=>'INSERT INTO book (`SKU`, `NAME`, `PRICE`, `WEIGHT`) VALUES(?,?,?,?);', 'furniture'=>'INSERT INTO furniture (SKU,NAME,PRICE,HEIGHT,WIDTH,LENGTH) VALUES(?,?,?,?,?,?);');

            $stmt = $this->connect()->prepare($queries[$this->type]);
            $arr = array_merge([$this->sku,$this->name, $this->price], $this->type == 'dvd'? [$this->size] : ($this->type == 'book'? [$this->weight ]: [$this->height,$this->width, $this->length]));
    
            if(!$stmt->execute($arr)){
                return false;
            }
            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
            return false;
        }
    }
    
}


