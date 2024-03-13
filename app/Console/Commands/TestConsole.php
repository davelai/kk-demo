<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestConsole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $json = '{
    "productId": 10012350,
    "productName": "[용인] 에버랜드 오후이용권 (방문날짜지정)(통합바코드)",
    "productVersion": 24,
    "price": {
        "currency": "KRW",
        "retailPrice": 150000.0,
        "salePrice": 31000.0,
        "salePriceName": "날짜선택/[A구간]에버랜드 오후권"
    },
    "productTypeCode": "LEISURE",
    "salePeriod": {
        "startDateTime": "2023-10-22T15:00:00Z",
        "endDateTime": "2024-08-10T14:59:59Z",
        "timezone": "Asia/Seoul",
        "offset": "+09:00"
    },
    "productBriefIntroduction": null,
    "productInfo": {
        "productBasicInfo": "* 판매기간 : ~ 2024.08.10",
        "productUsageInfo": "* 방문일지정 예약상품으로 지정한 날짜에 이용 가능합니다.\n* 대/소 공통 이용 가능하며 36개월부터 요금 적용됩니다.\n* 당일 에버랜드 입장 및 가동중인 시설 이용 가능합니다.\n- (단, 코인물/대여물/스페셜투어/기획전 등 별도 요금)\n* 일부 어트랙션/동물원/식당 이용시간은 에버랜드 마감시간과 다르게 조기 종료될수 있으니 사전에 에버랜드 모바일 앱에서 운영시간 확인 바랍니다.\n* 정문주차장은 유료, 외곽주차장은 무료로 운영됩니다.\n* QR코드의 사진을 판매사이트에 그대로 올리는 경우 제3자의 무단 도용에 따른 피해가 발생할 수 있습니다.\n\n* ▷에버랜드 http://www.everland.com",
        "facilityInfos": [
            {
                "facilityId": 13146,
                "facilityName": "에버랜드",
                "location": {
                    "longitude": 127.20257,
                    "latitude": 37.29391,
                    "address": "대한민국 경기도 용인시 처인구 포곡읍 에버랜드로 199 123"
                },
                "phoneNumber": "12341234",
                "administrativeBuildingCode": "4146125000",
                "isRepFacility": true,
                "facilityDetailInfo": "* 오시는길 : 길안내 내용\n* 홈페이지 : www.everland.com\n* 운영시간\n  - 매일 : 08:00~23:00\n* 휴무일 : 연중무휴\n* 주차 : 정문주차장은 유료, 외곽주차장은 무료로 운영됩니다.\n* 영업시간 : 에버랜드 홈페이지 참고(홈페이지 : www.everland.com)\n* 휴 무 : 휴무없음\n* 무료입장나이 : 36개월 미만 (증빙서류 지참 필수/미지참시 유아요금적용)\n"
            }
        ],
        "noticeInfo": null,
        "serviceCenterInfo": "* 고객센터 : 1599-8370 (야놀자 레저)\n* 상담시간 : 09:00 ~ 18:00 (연중무휴)",
        "refundInfo": "* 유효기간 내 미사용티켓 100% 환불가능\n* 유효기간 종료 후 미사용티켓 100% 환불\n* 사용한 티켓은 환불 불가능합니다.",
        "voucherUsageInfo": "* 이용 시 구간별 캘린더 확인 부탁드립니다\n* ※B시즌 이용불가일 : 토/일요일, 8/1(화)~8/4(금),8/14(월)~8/15(화)\n\n* ※ 방문일지정 예약상품으로 지정한 날짜에 이용 가능합니다.\n* ※ 본권은 오후권으로 2시30분부터 이용 가능합니다. \n\n* ★기침 등 증세가 있거나, 2주내 확진자와 접촉한 경우가 있는 고객은 마스크를 꼭 착용해 주시고, 자율적인 방역 수칙 실천을 부탁드립니다. \n* 입장 전 에버랜드 APP에 이용권 등록 바랍니다. APP 미등록 시 일부 시설의 예약/탑승이 제한될 수 있습니다.\n\n* ※ 일부 놀이기구 스마트줄서기 안내\n- (사전예약필수/ 매진되어 조기 마감될 수 있는점 참고 바랍니다.)\n- : https://bit.ly/3m82tY6\n\n* ※QR코드를 못받으신 경우 방문전 야놀자 고객센터(1599-8370)를 통해 재발송 요청 바랍니다. \n* 에버랜드 방문하여 확인 요청시 입장이 지연될 수 있습니다. (입장 전 우측 예매티켓교환처)\n- (응대 가능시간:~18시)\n\n\n* [이용안내]\n- 1.상품구매\n- 2.문자로 QR 코드수신\n- 3.MMS 상단에 보여지는 QR코드를 에버랜드 App에 등록 후\n- 에버랜드 정문에서 제시 후 입장"
    },
    "productOptionGroups": [
        {
            "productOptionGroupId": 10014240,
            "productId": 10012350,
            "productOptionGroupName": "[경기 용인] 에버랜드",
            "productOptionGroupDescription": null,
            "isSchedule": true,
            "isRound": false,
            "productOptions": [
                {
                    "productOptionId": 10021070,
                    "productOptionName": "날짜명",
                    "hierarchicalOrder": 1,
                    "productOptionTypeCode": "SCHEDULE",
                    "productOptionItems": [
                        {
                            "productOptionItemId": 10088981,
                            "productOptionItemName": "날짜선택",
                            "sortOrder": 1,
                            "schedules": []
                        }
                    ]
                },
                {
                    "productOptionId": 10021071,
                    "productOptionName": "옵션선택",
                    "hierarchicalOrder": 2,
                    "productOptionTypeCode": "LIST",
                    "productOptionItems": [
                        {
                            "productOptionItemId": 10088982,
                            "productOptionItemName": "[A구간]에버랜드 오후권",
                            "sortOrder": 1
                        },
                        {
                            "productOptionItemId": 10088983,
                            "productOptionItemName": "[B구간]에버랜드 오후권",
                            "sortOrder": 2
                        }
                    ]
                }
            ],
            "variants": [
                {
                    "variantId": 10267920,
                    "productId": 10012350,
                    "variantName": "날짜선택/[A구간]에버랜드 오후권",
                    "variantDescription": null,
                    "refundApprovalTypeCode": "ADMIN",
                    "quantityPerPerson": 20,
                    "quantityPerPurchase": 20,
                    "quantityPerPersonValidityDays": 30,
                    "sortOrder": 1,
                    "isRefundableAfterExpiration": false,
                    "isAvailableOnPurchaseDate": true,
                    "refundInfo": "유효기간 종료일 까지 취소 요청 가능",
                    "isDisplay": true,
                    "orderExpirationUsageProcessTypeCode": "FORCED_USE",
                    "orderExpirationDateTypeCode": "RESERVATION_DATE",
                    "price": {
                        "currency": "KRW",
                        "retailPrice": 150000.0,
                        "discountSalePrice": null,
                        "salePrice": 31000.0,
                        "costPrice": 29605.0
                    },
                    "fee": {
                        "feeTypeCode": "REVENUE_SHARE",
                        "feeRate": null,
                        "revenueShareRate": 0.5
                    },
                    "salePeriod": {
                        "startDateTime": "2023-10-22T15:00:00Z",
                        "endDateTime": "2024-08-10T14:59:59Z",
                        "timezone": "Asia/Seoul",
                        "offset": "+09:00"
                    },
                    "productOptionItems": [
                        {
                            "productOptionItemId": 10088981,
                            "productOptionItemName": "날짜선택"
                        },
                        {
                            "productOptionItemId": 10088982,
                            "productOptionItemName": "[A구간]에버랜드 오후권"
                        }
                    ],
                    "variantItems": [
                        {
                            "supplyItemId": 10003513,
                            "supplyItemName": "[A구간]EL예약오후A3@32.0_20230801~20241231",
                            "validityPeriodTypeCode": "FIX",
                            "validityPeriod": {
                                "startDateTime": "2023-06-30T15:00:00Z",
                                "endDateTime": "2024-12-31T14:59:59Z",
                                "timezone": "Asia/Seoul",
                                "offset": "+09:00"
                            },
                            "validityDays": null,
                            "sellerInfoId": "0003000010",
                            "isVoucherUsed": true,
                            "voucherDisplayTypeCode": "QR"
                        }
                    ],
                    "variantStatusCode": "IN_SALE"
                },
                {
                    "variantId": 10267921,
                    "productId": 10012350,
                    "variantName": "날짜선택/[B구간]에버랜드 오후권",
                    "variantDescription": null,
                    "refundApprovalTypeCode": "ADMIN",
                    "quantityPerPerson": 20,
                    "quantityPerPurchase": 20,
                    "quantityPerPersonValidityDays": 30,
                    "sortOrder": 2,
                    "isRefundableAfterExpiration": false,
                    "isAvailableOnPurchaseDate": true,
                    "refundInfo": "유효기간 종료일 까지 취소 요청 가능",
                    "isDisplay": true,
                    "orderExpirationUsageProcessTypeCode": "FORCED_USE",
                    "orderExpirationDateTypeCode": "RESERVATION_DATE",
                    "price": {
                        "currency": "KRW",
                        "retailPrice": 160000.0,
                        "discountSalePrice": null,
                        "salePrice": 32000.0,
                        "costPrice": 30560.0
                    },
                    "fee": {
                        "feeTypeCode": "REVENUE_SHARE",
                        "feeRate": null,
                        "revenueShareRate": 0.5
                    },
                    "salePeriod": {
                        "startDateTime": "2023-10-22T15:00:00Z",
                        "endDateTime": "2024-08-10T14:59:59Z",
                        "timezone": "Asia/Seoul",
                        "offset": "+09:00"
                    },
                    "productOptionItems": [
                        {
                            "productOptionItemId": 10088981,
                            "productOptionItemName": "날짜선택"
                        },
                        {
                            "productOptionItemId": 10088983,
                            "productOptionItemName": "[B구간]에버랜드 오후권"
                        }
                    ],
                    "variantItems": [
                        {
                            "supplyItemId": 10003514,
                            "supplyItemName": "[B구간]EL예약오후A3@32.0_20230801~20241231",
                            "validityPeriodTypeCode": "FIX",
                            "validityPeriod": {
                                "startDateTime": "2023-06-30T15:00:00Z",
                                "endDateTime": "2024-12-31T14:59:59Z",
                                "timezone": "Asia/Seoul",
                                "offset": "+09:00"
                            },
                            "validityDays": null,
                            "sellerInfoId": "0003000010",
                            "isVoucherUsed": true,
                            "voucherDisplayTypeCode": "QR"
                        }
                    ],
                    "variantStatusCode": "IN_SALE"
                }
            ]
        }
    ],
    "searchKeywords": [
        "에버랜드",
        "놀이동산",
        "주말나들이",
        "테마파크"
    ],
    "categories": [
        {
            "categoryCode": "10590000",
            "categoryLevel": 0,
            "subCategories": [
                {
                    "categoryCode": "10590009",
                    "categoryLevel": 1,
                    "subCategories": [
                        {
                            "categoryCode": "158",
                            "categoryLevel": 2,
                            "subCategories": []
                        }
                    ]
                }
            ]
        }
    ],
    "regions": [
        {
            "regionId": 1,
            "regionCode": "AS",
            "parentRegionId": null,
            "regionName": "아시아",
            "regionLevel": 1,
            "subRegions": [
                {
                    "regionId": 2,
                    "regionCode": "KR",
                    "parentRegionId": 1,
                    "regionName": "대한민국",
                    "regionLevel": 2,
                    "subRegions": [
                        {
                            "regionId": 1244,
                            "regionCode": "02",
                            "parentRegionId": 2,
                            "regionName": "경기",
                            "regionLevel": 3,
                            "subRegions": [
                                {
                                    "regionId": 1300,
                                    "regionCode": "0202",
                                    "parentRegionId": 1244,
                                    "regionName": "수원",
                                    "regionLevel": 4,
                                    "subRegions": [
                                        {
                                            "regionId": 1306,
                                            "regionCode": "020201",
                                            "parentRegionId": 1300,
                                            "regionName": "경기 수원",
                                            "regionLevel": 5,
                                            "subRegions": []
                                        }
                                    ]
                                }
                            ]
                        }
                    ]
                }
            ]
        }
    ],
    "images": [
        {
            "imageTypeCode": "THUMBNAIL",
            "imageUrls": [
                "https://qa-image6.yanolja.com/leisure/G2g3EJ21sgRjc7AP"
            ]
        },
        {
            "imageTypeCode": "ROLLING",
            "imageUrls": [
                "https://qa-image6.yanolja.com/leisure/NFo7K1RZlNiqa3HN",
                "https://qa-image6.yanolja.com/leisure/MWqQLQNjKa6SF4uz",
                "https://qa-image6.yanolja.com/leisure/WY6nn3PO4t4rlm0R"
            ]
        },
        {
            "imageTypeCode": "DETAIL",
            "imageUrls": [
                "https://qa-image6.yanolja.com/leisure/9Y3uFZ7iEknFMIQE",
                "https://qa-image6.yanolja.com/leisure/1FApcG4mkG8OZR7p"
            ]
        }
    ],
    "videos": [
        {
            "videoTypeCode": "ROLLING",
            "videoUrl": "https://lqt-images-qa.yanolja.com/leisure-web/video/35505323-7c23-4c89-bf9a-b0bb9f5fed81.m3u8",
            "videoThumbnailImageUrl": "https://qa-image6.yanolja.com/leisure/p2m75dVCQGg0U5OK"
        }
    ],
    "pictograms": [
        {
            "pictogramName": "이용 방법",
            "iconName": "picto-usage-guide",
            "pictogramContent": "QR/바코드 확인 후 입장"
        },
        {
            "pictogramName": "영업시간",
            "iconName": "picto-opening-hours",
            "pictogramContent": "지점별로 상이"
        },
        {
            "pictogramName": "당일이용 가능여부",
            "iconName": "picto-usable-today",
            "pictogramContent": "당일 이용 가능"
        }
    ],
    "isCancelPenalty": false,
    "isReservationAfterPurchase": false,
    "purchaseDateUsableTypeCode": "ALL",
    "isAvailableOnPurchaseDate": true,
    "isIntegratedVoucher": true,
    "isRefundableAfterExpiration": false,
    "isUsed": true,
    "sellerInfos": [],
    "convenienceTypeCodes": [],
    "productStatusCode": "IN_SALE"
}';

        $array = json_decode($json);
    $data =     json_decode($json, true);
        dd(
            collect(
                $data['productOptionGroups']
            )
                ->where('productId', 10012350)
                ->flatten(2)
                ->where('variantId', 10267920)
        );

    }
}
