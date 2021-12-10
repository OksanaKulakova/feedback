<?php

namespace App\Order;

use App\Order\OrderInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FileOrder implements OrderInterface
{
    protected $fileName = 'db.csv';

    public function create(array $attributes)
    {
        $path = Storage::path($this->fileName);

        $fileDb = fopen($path, 'a+');
        fputcsv($fileDb, $attributes);
        fclose($fileDb);
    }
}