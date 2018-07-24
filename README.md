Ns SDK
=============
Notification Service SDK working with GMS-worldwide Api, Mailerlite, Asterisk, Infobip.
You can send messages to a group of users or only one, by any of the sending channels: sms, viber, email.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require matviichuk/notification-service-sdk
```

or add

```
"matviichuk/notification-service-sdk": "^1.0"
```
to the require section of your composer.json file.

Usage
------------
```
use matviichuk\NsSdk\HttpServiceConfigurator;
use matviichuk\NsSdk\Service;
use matviichuk\NsSdk\Auth\AccessToken;
use matviichuk\NsSdk\Resources\CampaignsResource;
use matviichuk\NsSdk\Requests\Campaigns\GetCampaignsRequest;
use matviichuk\NsSdk\Requests\Campaigns\GetCampaignRequest;
use matviichuk\NsSdk\Requests\Campaigns\CreateCampaignRequest;
use matviichuk\NsSdk\Requests\Campaigns\UpdateCampaignRequest;
use matviichuk\NsSdk\Requests\Campaigns\DeleteCampaignRequest;

$configure   = new HttpServiceConfigurator();
$nsClient    = new Service($configure);
$accessToken = new AccessToken('Your email in Notification Service', 'Your password');

$nsClient->authorization($accessToken);      // after that you will be authorized

- Get all campaigns:
    $result = $nsClient->execute(new CampaignsResource(), new GetCampaignsRequest());
        
- Get one campaign:
    $result = $nsClient->execute(new CampaignsResource(), new GetCampaignRequest({$campaignId}));
            
- Create new campaign:
    $campaign = new CreateCampaignRequest();
    $campaign->setName('Campaign name');
    $campaign->setProviderId({$providerId});
    
    $result   = $nsClient->execute(new CampaignsResource(), $campaign);
    
- Update campaign:
    $campaign = new UpdateCampaignRequest({$campaignId});
    $campaign->setName('New campaign name');
    $campaign->setProviderId({$providerId});
    
    $result   = $nsClient->execute(new CampaignsResource(), $campaign);
    
- Delete campaign:
    $result = $nsClient->execute(new CampaignsResource(), new DeleteCampaignRequest({$campaignId}));
    
*response: campaign object
```
