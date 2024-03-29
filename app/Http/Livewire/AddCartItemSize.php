<?php

namespace App\Http\Livewire;

use App\Models\Size;
use Livewire\Component;

class AddCartItemSize extends Component
{
    public $product;
    public $size_id = '';
    public $colors = [];
    public $qty = 1;
    public $quantity = 0;
    public $color_id = '';

    public function mount()
    {
        $this->sizes = $this->product->sizes;
    }

    public function updatedSizeId($value)
    {
        $size = Size::find($value);
        $this->colors = $size->colors;
    }

    public function decrement()
    {
        $this->qty--;
    }

    public function increment()
    {
        $this->qty++;
    }

    public function updatedColorId($value)
    {
        $size = Size::find($this->size_id);
        $this->quantity = $size->colors->find($value)->pivot->quantity;
    }

    public function render()
    {
        return view('livewire.add-cart-item-size');
    }
}
