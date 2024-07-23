<?php

namespace App\Repositories;

use App\Models\Faqs;
use App\Models\FaqsTranslation;
use Illuminate\Http\Request;

class FaqsRepository
{
    public function showFaqs()
    {
        $faq = new Faqs();
        $data = $faq->with('faqsTranslations')->orderBy('priority')->get();
        $array = json_decode($data, true);
        foreach ($array as $element) {
            $arr = [];
            foreach ($element['faqs_translations'] as $elementmin) {
                if ($elementmin['locale'] == 'AR') {
                    $arr[] = ['id_ar' => $elementmin['id'], 'title_ar' => $elementmin['title'], 'description_ar' => $elementmin['description']];
                } elseif ($elementmin['locale'] == 'EN') {
                    $arr[] = ['id_en' => $elementmin['id'], 'title_en' => $elementmin['title'], 'description_en' => $elementmin['description']];
                }
            }
            $response[] = $arr;
        }

        return  $response;
    }

    public function showAllFaqs(int $perPage = 8)
    {
        $faq = new Faqs();
        $response = $faq->with('faqsTranslations')->orderBy('priority')->paginate($perPage);

        return  $response;
    }

    public function createFaq(Request $request)
    {
        $is_active = $request->is_active ? 1 : 0;
        $faq = new FaqsTranslation();
        $lastInsertedId = Faqs::insertGetId(['is_active' => $is_active, 'priority' => $request->priority]);
        $faq->create([
            'faqs_id' => $lastInsertedId,
            'locale' => 'ar',
            'title' => $request->ar_question,
            'description' => $request->ar_answer,
        ]);
        $faq->create([
            'faqs_id' => $lastInsertedId,
            'locale' => 'en',
            'title' => $request->en_question,
            'description' => $request->en_answer,
        ]);
    }

     public function updatedFaq(Request $request)
     {
         $faqParent = Faqs::find($request->id);
         $faqParent->is_active = isset($request->is_active) ? ($request->is_active == 'true' ? true : false) : $faqParent->is_active;
         $faqParent->priority = isset($request->priority) ? $request->priority : $faqParent->priority;

         $translations = [
             'ar' => [
                 'title' => $request->ar_question,
                 'description' => $request->ar_answer,
             ],
             'en' => [
                 'title' => $request->en_question,
                 'description' => $request->en_answer,
             ],
         ];

         foreach ($translations as $locale => $data) {
             $faqParent->faqsTranslations()
                 ->where('locale', $locale)
                 ->update($data);
         }

         $faqParent->save();

         return $faqParent;
     }

      public function deleteFaqs(int $id)
      {
          $response = Faqs::where('id', '=', $id)->delete();
          $response1 = FaqsTranslation::where([['faqs_id', '=', $id], ['locale', '=', 'AR']])->delete();
          $response1 = FaqsTranslation::where([['faqs_id', '=', $id], ['locale', '=', 'EN']])->delete();
      }
}
