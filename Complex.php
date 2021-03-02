<?php

class Complex
{
	// = $re + $im * i
	protected $re = 0;
	protected $im = 0;

	public function __construct($re, $im)
	{
		$this->re = $re;
		$this->im = $im;
	}

	public function show()
	{
		echo "$this->re + $this->im * i; ";
	}

	protected function isNull(Complex $num)
	{
		if ($num->re === 0 && $num->im === 0) {
			return true;
		}
	}

	public function sum(Complex $secondNum)
	{
		$reRes = $this->re + $secondNum->re;
		$imRes = $this->im + $secondNum->im;

		return new Complex($reRes, $imRes);
	}

	public function sub(Complex $secondNum)
	{
		$reRes = $this->re - $secondNum->re;
		$imRes = $this->im - $secondNum->im;

		return new Complex($reRes, $imRes);
	}

	public function mul(Complex $secondNum)
	{
		$reRes = $this->re * $secondNum->re - $this->im * $secondNum->im;
		$imRes = $this->im * $secondNum->re + $this->re * $secondNum->im;

		return new Complex($reRes, $imRes);
	}

	public function div(Complex $secondNum)
	{
		if ($this->isNull($secondNum)) {
			echo 'На ноль делить нельзя';
			die;
		}
		$reRes = ($this->re * $secondNum->re + $this->im * $secondNum->im)/
			($secondNum->re * $secondNum->re + $secondNum->im * $secondNum->im);

		$imRes = ($this->im * $secondNum->re - $this->re * $secondNum->im)/
			($secondNum->re * $secondNum->re + $secondNum->im * $secondNum->im);

		return new Complex($reRes, $imRes);
	}
}



// Test

$num1 = new Complex(1, 2);
$num2 = new Complex(1, -1);


$num1->sum($num2)->show();
$num1->sub($num2)->show();
$num1->mul($num2)->show();
$num1->div($num2)->show();

$num1 = new Complex(1, 2);
$num2 = new Complex(0, 0);
$num1->div($num2)->show();

