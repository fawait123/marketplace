<?php
namespace App\Helpers;
use App\Models\Transaction as ModelTransaction;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Storage;


class Utils{
    public static function price($harga,$harga_promo)
    {
        return auth()->user()->member && auth()->user()->member->is_active == 1 ? $harga_promo ? $harga_promo : $harga : $harga;
    }

    public function displayPrice($price,$harga_promo)
    {
        return $harga_promo ? $harga_promo : $harga;
    }

    public static function transactionCart($substract)
    {
        $from = Carbon::now()
            ->subDays($substract)
            ->format('Y-m-d');
        $from = $from .' 00:00:00';
        $to = Carbon::now()
            ->subDays(0)
            ->format('Y-m-d');
        $to = $to .' 23:59:00';
       $transaction =  ModelTransaction::where('status','completed')->whereBetween('created_at', [$from,$to])->get();

       $total = $transaction ? $transaction->sum(function($data){
        $additional = json_decode($data->additional);
        return $data->total + $additional->price;
       }) : 0;

       return [
        'data'=>$transaction,
        'total'=>$total
       ];
    }


    public static function cart($from,$to)
    {
        $period = CarbonPeriod::create($from,'1 month',$to);
        $data = collect([]);
        foreach($period as $pd){
            $froms = $pd->format('Y-m').'-01' .' 00:00:00';
            $to = $pd->format('Y-m') .'-31'.' 23:59:00';
            $transaction =  ModelTransaction::where('status','completed')->whereBetween('created_at', [$from,$to])->get();
            $data->push([
                'amount'=>count($transaction),
                'total'=>$transaction->sum(function($data){
                    $additional = json_decode($data->additional);
                    return $data->total + $additional->price;
                }),
                'month'=>$pd->format('M').'/'.$pd->format('Y')
            ]);
        }
        return $data;
    }

    public static function url($url)
    {
        return 'https://drive.google.com/uc?export=view&id='. $url ;
    }


    public static function upload($file)
    {
        $uploaded = Storage::disk('google')->put($file->getClientOriginalName(), $file->getContent());
        $meta = Storage::disk("google")
                ->getAdapter()
                ->getMetadata($file->getClientOriginalName());
        return $meta['path'];
    }
}
