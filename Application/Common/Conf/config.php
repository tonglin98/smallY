<?php
return array(
	//'配置项'=>'配置值'
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '118.24.28.102', // 服务器地址
    'DB_NAME'               =>  'tonglin_7458ff_c',          // 数据库名
    'DB_USER'               =>  'tonglin_7458ff_c',      // 用户名
    'DB_PWD'                =>  'S376LrfET36tsM8S',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'sm_',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'        =>  0, // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'        =>  false,       // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'         =>  1, // 读写分离后 主服务器数量
    'DB_SLAVE_NO'           =>  '', // 指定从服务器序号
    'URL_MODEL'=>'2',

//    'WX_PAY'=>[
//        'app_id'=>'wx426b3015555a46be'
//        ,'mch_id'=>'1900009851'
//        ,'key'=>'8934e7d15453e97507ef794cf7b0519d'
//        ,'app_secret'=>'7813490da6f1265e4901ffb80afaa36f'
//    ]
    'WX_PAY'=>[
        'app_id'=>'wx8b63d599ca2983b1'
        ,'mch_id'=>'1429102902'
        ,'key'=>'qtws8888888888888888888888888888'
        ,'app_secret'=>'7ac589ad904eb934b4ff1c7f16786c25'
    ],
    //app_id
    //私钥
    //公钥
    //网关
    //商户 uid
    'ZFB_PAY'=>[
        'app_id'=>'2016092700608065'
        ,'merchant_private_key'=>"MIIEpAIBAAKCAQEA8PthRQkSPQi1E2ncwS9cjFeV8TvvT9gH+k9VnjCpsLGM/16yfxywny2InYUX/aLtr1lQ3eQhq/FLuGy7oKaMqB7z9owzJ4gfdYJ2OvI6d5w3GEzv5bKlqSoxxIWbqYSO7oyZjxu7QXNbgTJ6zE7O3UnCzkeK2R25NMq7rhbt4zrO9R+xAeTkkxGM5BcDnn7tynvgACl/VMO+LdXaCRlCyX0RnZHPPmf0Au52P7akeKD3cxY+xBjlAPNFbeQyk2+5nvmxLyPXPnjU4x1vZ5b4TD8UQUsASjFUTR8FK+zn9jKr9rCZYkK1B6a7C8xoxmnnNxWcg/BeTIwA9xTO7zbazwIDAQABAoIBAQDRGD2pKhrSLJj5lFSAp3i1KVYoL+oRLJCXh3jxvqWudBC0kFVu59T0+QxeKVrMsC9ug6AgOE9jIwahqm8PERRg2CK1HadRONKbIq01rnI+0KQZiMBrXRxS8RKnw4pyh1uB7ytauiQ7wT13l/ZnCkaCSfsnA3qdsyW9gd9hSfH1w6U8GvPAFAAjKxdxKgI0OQZ7I6/gHpP0U2RihpKDKgkrVUvaQfOVpasPAjfpdoQ/QeICSr2+V7Xt+N+T12bQjGnM2Sh6hc68mMFOEqRCfn6eW6WfHs7LKsnvjaYBjFwhy+V6LURp9pWQ8IZB+83xl1ymYWDSFS/4KniYiqC4Ci45AoGBAPry8HZOhoivajWGD/oD7PXCt4Ft6Nz34HzHamVyceQ2AewzGGsE+fBbrF384HXLQaaCsR61LNhWnUFUIAmhtzJUfnIR8fNQU49mlLDVJwUwTk7Q2tzWL5AjB77vxlPnX7ZpRvDTKSfblyAdxums7SOcZNY63NLTY2edhPLNqz+tAoGBAPXVFW37R0W0BKUL1+xvXCniLz1e6Ag9teecONcq5gjEtiySSQhscITGBdnP8kxGD/bzMRsQuIUFNSG5cHwfEmOfDLSldhjqanKrD7pEgZVCRwTAForRET5JIPpYgIAkDgpvs48OAzqL61dxs5SV1lLXkchasA2Eji5Ft3PtYePrAoGAAPYLO7jDRSS+2GOiDggT0UEkqMc9/BKq9m9hFfBhRUl7qmbrsgU729LODzIXvfvATZ30hbSV7mIuigCDeuX2qKewMEmnTpJBL6xp5195nch4lE6yd+QOHJQ1xGJwtQOO10kB74wvfSqXIpVanKx/4AIKVNO24svSdqQgzTlCbaUCgYAN12OPf7hxmkMwr8wGifacfRm/0NorrJ3TXp5srwOotrqzI8Fs8f4b27J0oxq3ZLJ9aw/2wChDhRmKvpAwzOcSKOBkQ3S0zm4T6sHF8RmCt+qbv90FD+Ryp1duARGrJVyNBeEMSvOvljU4BTThRtZ8b5rLtx92g2ImBNLhehoq5QKBgQDUE+Yp93NxTzW6PWyccJ74a0Zm/xSgH5XpCRhz1rD6IgrBF0s7VfX+qilGbN/o04GGB118hHMvGi1OXkoBAgIGy5Lc9LUv+b1OyLtotSlZHNIowAtxO3AaxfG0QbEZ7Y+eXqcYls6+4c7CUpy2s4QnHnWIrZUYBa7KLyGvva8Shg=="
        ,'alipay_public_key'=>"MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEA8PthRQkSPQi1E2ncwS9cjFeV8TvvT9gH+k9VnjCpsLGM/16yfxywny2InYUX/aLtr1lQ3eQhq/FLuGy7oKaMqB7z9owzJ4gfdYJ2OvI6d5w3GEzv5bKlqSoxxIWbqYSO7oyZjxu7QXNbgTJ6zE7O3UnCzkeK2R25NMq7rhbt4zrO9R+xAeTkkxGM5BcDnn7tynvgACl/VMO+LdXaCRlCyX0RnZHPPmf0Au52P7akeKD3cxY+xBjlAPNFbeQyk2+5nvmxLyPXPnjU4x1vZ5b4TD8UQUsASjFUTR8FK+zn9jKr9rCZYkK1B6a7C8xoxmnnNxWcg/BeTIwA9xTO7zbazwIDAQAB"
        ,'gatewayUrl'=>'https://openapi.alipaydev.com/gateway.do'
        ,'seller_id'=>'2088102177502654'
        ,'alipay_public_notify'=>'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAz/j4I+p/5u2yugnrDetfHKRg4mtICPVBAgw+wBTopRloCqlpv/wBwQBzMj3GUgnIs846oHn8PzvQpCkCExrFP+iIFMw8PlhZuqx53Xhz4LGgFfY/N+hfmRkXtdZh2Ot2rFa5irFTZT/4zyuXOOk6KqTi4s3GPfGtVd/RPjcEN/OalY0tGGelXr3DkdB7o6ZsEo/HtrolbUHmUVSuyTdKgj+bYYtDW5mcaHhXxIW6b8FUhyW8xHIIhUk7K8zdKM0r94EX0Z+JtXOheYYl/hqJzXKAKo7QCIqq5iGVff5hMZeRfvmPNgIgNyyUpWhcZ1jAFWA8gSMkABQggGzjGEItuQIDAQAB'
    ]
);
