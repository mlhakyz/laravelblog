<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoryRequest;

class FormController extends Controller
{
    public function show() {
        // Oturum bilgisini kontrol ederek hikayeyi tekrar
        // oluştur.

        $story = session()->has('story_params')
            ? $this->prepareStoryText(session()->get('story_params'))
            : null;

        return view('story.show', compact('story'));
    }

    public function handle(StoryRequest $request) {
        // Hikayeyi oluşturmak için gerekli olan bilgileri
        // oturum bilgisine kaydet.

        $request->session()->put(
            'story_params', 
            $request->only('name', 'hobby', 'drink', 'notes')
        );
       
        return redirect()->route('story.show');
    }

    private function prepareStoryText($params) {
        $story = "Kahramanımız " . $params['name'] . " bir sabah "
            . "korkunç düşlerden uyandığında bir daha asla "
            . $this->prepareHobbyPartForStoryText($params['hobby'])
            . " dehşetine kapıldı. \"Bu böyle gitmez, ben en iyisi ayılmak için bir "
            . $this->prepareDrinkPartForStoryText($params['drink'])
            . " içeyim\" dedi" . $params['notes'];

        return $story;
    }

    private function prepareHobbyPartForStoryText($hobby) {
        return match ($hobby) {
            'music' => "Vivaldi'den Four Season Winter'ı dinleyemeyeceği",
            'art' => "Van Gogh 'un eşsiz tablosu Yıldızlı Gece'yi göremeyeceği",
            'video-games' => "mouse unun sağ tıkının bir daha çalışmayacağı",
        };
    }

    private function prepareDrinkPartForStoryText($drink) {
        return match ($drink) {
            'ice' => "denizin buz gibi sularından esinlenmiş ice macchiato",
            'mocha' => "çikolatasını kulağıma damlatmalık bir mocha",
            'tea' => "çay",
            'coffee' => "nöronlarını harekete geçirecek bir filtre kahve",
        };
    }
}
