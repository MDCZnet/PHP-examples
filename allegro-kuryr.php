<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.allegro.pl/order/checkout-forms/53c65870-5978-11ef-bc8d-a7794ae37630/shipments',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

// DISABLE SSL
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/vnd.allegro.public.v1+json',
    'Accept: application/vnd.allegro.public.v1+json',
    'Authorization: Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX25hbWUiOiIxMjMzMjEyMDQiLCJzY29wZSI6WyJhbGxlZ3JvOmFwaTpvcmRlcnM6cmVhZCIsImFsbGVncm86YXBpOmZ1bGZpbGxtZW50OnJlYWQiLCJhbGxlZ3JvOmFwaTpwcm9maWxlOndyaXRlIiwiYWxsZWdybzphcGk6c2FsZTpvZmZlcnM6d3JpdGUiLCJhbGxlZ3JvOmFwaTpmdWxmaWxsbWVudDp3cml0ZSIsImFsbGVncm86YXBpOmJpbGxpbmc6cmVhZCIsImFsbGVncm86YXBpOmNhbXBhaWducyIsImFsbGVncm86YXBpOmRpc3B1dGVzIiwiYWxsZWdybzphcGk6YmlkcyIsImFsbGVncm86YXBpOnNoaXBtZW50czp3cml0ZSIsImFsbGVncm86YXBpOnNhbGU6b2ZmZXJzOnJlYWQiLCJhbGxlZ3JvOmFwaTpvcmRlcnM6d3JpdGUiLCJhbGxlZ3JvOmFwaTphZHMiLCJhbGxlZ3JvOmFwaTpwYXltZW50czp3cml0ZSIsImFsbGVncm86YXBpOnNhbGU6c2V0dGluZ3M6d3JpdGUiLCJhbGxlZ3JvOmFwaTpwcm9maWxlOnJlYWQiLCJhbGxlZ3JvOmFwaTpyYXRpbmdzIiwiYWxsZWdybzphcGk6c2FsZTpzZXR0aW5nczpyZWFkIiwiYWxsZWdybzphcGk6cGF5bWVudHM6cmVhZCIsImFsbGVncm86YXBpOnNoaXBtZW50czpyZWFkIiwiYWxsZWdybzphcGk6bWVzc2FnaW5nIl0sImFsbGVncm9fYXBpIjp0cnVlLCJpc3MiOiJodHRwczovL2FsbGVncm8ucGwiLCJleHAiOjE3MjM3NjUyNDgsImp0aSI6ImYzNzgxNjk1LWViMmMtNDRkOC04ZjgxLWMxYmRkMGJiMDJmNyIsImNsaWVudF9pZCI6Ijc3ZjNkNjQ2ZTYxMzQxYWY4Yzk3MWVjNjVkMjhlYzkxIn0.SL_xZtYuL7PhvziHlzPpunzCr5_j7IRQ85SpWtScHZ3UrfNwjza-2f_mre5JTLBGgbspNllYj7IchzFMdHrLM4yM8Oi8uLsjqnM4n6zJCzTCgmgg3eLn8dtgBzuIyidejp-ui56Ppd_O8J76Fa5ajLFXWngcUHMe9aIgOCxxms9-MpBQgiHWnLgD75MOfIvn6cd_tpb1ybmd43ioxK--yS3UeHTw6LLQGSKbGXckXXqb6E9jWaH7eFnJf-Urz8nyUIjnNfgy3npCjzvj-iuyDzd9D1r164OnG9htXIhFkMB2RJWjyRhKR1vLhrwVsXhQX4ufXXgkF7LDe7j0Ncy5MQ',
    'Cookie: QXLSESSID=3cd7ab06ec4550195aea07c4578483de493a7819030b7b//02; _cmuid=f3e8e2b4-a770-4822-98aa-a36eabcd1371; wdctx=v5.-UlHVi6NMEiDtXpRVJDzf1Ipir-Zt0scBOcQUa_SuikwZb2obpk3BOkuq1HE3V5_iKGYkKGjG-bXsv32J2LYsgor0egMlN5UOyZtG6xoxYk4NRdOsklZADSa0UwHat7OYmkurxf2xvaxcJDoKrWuPz7b5YBMyYeFpS7dPrGGkyb48fxQ7vkEGyrqtvaGU_gm6LluM3aIvmfjxo7PBtwTr1GA9bl7LrcnbkPWNvBx6k2b.mbjyONdlRmKyb8qOs1PCew.gT1rJ-mvjgc'
  ),
));

$response = curl_exec($curl);

//CHECK IF ERROR
if(curl_errno($curl)){
  echo 'Curl error: ' . curl_error($curl);
}

curl_close($curl);

// CELÝ JSON
echo $response . PHP_EOL . PHP_EOL;

$response = json_decode($response, true);

// PARSING...
echo 'prepravce: ' . $response['shipments'][0]['carrierId'] . PHP_EOL;
echo 'tracking_code: ' . $response['shipments'][0]['waybill'] . PHP_EOL;
echo 'url: ' . 'https://www.dpdgroup.com/cz/mydpd/my-parcels/incoming?parcelNumber=' . $response['shipments'][0]['waybill'] . PHP_EOL;


