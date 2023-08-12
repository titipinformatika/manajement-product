<?php
namespace TitipInformatika\Entity;

class Product{

    private string $id,$name,$description;
    private int $price,$quantity;

    

	/**
	 * @return string
	 */
	public function getId(): string {
		return $this->id;
	}
	
	/**
	 * @param string $id 
	 * @return void
	 */
	public function setId(string $id): void {
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}
	
	/**
	 * @param string $name 
	 * @return void
	 */
	public function setName(string $name): void {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getDescription(): string {
		return $this->description;
	}
	
	/**
	 * @param string $description 
	 * @return void
	 */
	public function setDescription(string $description): void {
		$this->description = $description;
	}

	/**
	 * @return int
	 */
	public function getPrice(): int {
		return $this->price;
	}
	
	/**
	 * @param int $price 
	 * @return void
	 */
	public function setPrice(int $price): void {
		$this->price = $price;
	}

	/**
	 * @return int
	 */
	public function getQuantity(): int {
		return $this->quantity;
	}
	
	/**
	 * @param int $quantity 
	 * @return void
	 */
	public function setQuantity(int $quantity): void {
		$this->quantity = $quantity;
	}
}