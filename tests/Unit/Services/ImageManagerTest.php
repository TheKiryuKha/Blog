<?php

use App\Services\ImageManager;

it('downloads file', function(){

    $path = 'https://www.google.com/imgres?q=Kiheitai&imgurl=https%3A%2F%2Fupload.wikimedia.org%2Fwikipedia%2Fcommons%2F2%2F25%2FKeiheitai.jpg&imgrefurl=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FKiheitai&docid=2OuOZ0bFZpV33M&tbnid=cTSDVaGHOFxquM&vet=12ahUKEwiv0-HO4fWMAxXiQVUIHax1D-oQM3oECBUQAA..i&w=800&h=527&hcb=2&ved=2ahUKEwiv0-HO4fWMAxXiQVUIHax1D-oQM3oECBUQAApaUBaeNR0UDEwOeKiH+6X0GF2TQ0Pkz/9k=';
    $download_manager = app(ImageManager::class);

    $name = $download_manager->save($path);

    expect('storage/' . $name)->toBeFile();
    
    $download_manager->delete('storage/' . $name);
});

it('deletes file', function(){

    $path = 'https://www.google.com/imgres?q=Kiheitai&imgurl=https%3A%2F%2Fupload.wikimedia.org%2Fwikipedia%2Fcommons%2F2%2F25%2FKeiheitai.jpg&imgrefurl=https%3A%2F%2Fen.wikipedia.org%2Fwiki%2FKiheitai&docid=2OuOZ0bFZpV33M&tbnid=cTSDVaGHOFxquM&vet=12ahUKEwiv0-HO4fWMAxXiQVUIHax1D-oQM3oECBUQAA..i&w=800&h=527&hcb=2&ved=2ahUKEwiv0-HO4fWMAxXiQVUIHax1D-oQM3oECBUQAApaUBaeNR0UDEwOeKiH+6X0GF2TQ0Pkz/9k=';
    $download_manager = app(ImageManager::class);
    $name = $download_manager->save($path);

    $download_manager->delete('storage/' . $name);

    expect('storage/' . $name)->not->toBeFile();
});