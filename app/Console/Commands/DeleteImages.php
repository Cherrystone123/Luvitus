<?php

// app/Console/Commands/DeleteImages.php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class DeleteImages extends Command
{
    protected $signature = 'delete:images';
    protected $description = 'Delete saved images';

    public function handle()
    {
        $this->info('Deleting images...');

        // Logic to delete images
        $images = Image::all();

        foreach ($images as $image) {
            Storage::disk('public')->delete($image->photo);
            $image->delete();
        }

        $this->info('Images deleted successfully.');
    }
}
