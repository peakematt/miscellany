# Events

---

- [All Events](#all-events)
- [Single Event](#event)
- [Create a Event](#create-event)
- [Update a Event](#update-event)
- [Delete a Event](#delete-event)

<a name="all-events"></a>
## All Events

You can get a list of all the events of a campaign by using the following endpoint.

> {warning} Don't forget that all endpoints documented here need to be prefixed with `api/{{version}}/campaign/{campaign.id}/`.


| Method | Endpoint| Headers |
| :- |   :-   |  :-  |
| GET/HEAD | `events` | Default |

### Results
```json
{
    "data": [
        {
            "id": 1,
            "name": "Battle of Hadish",
            "entry": "\n<p>Lorem Ipsum.</p>\n",
            "image": "{path}",
            "image_full": "{url}",
            "image_thumb": "{url}",
            "is_private": true,
            "entity_id": 7,
            "tags": [],
            "created_at": {
                "date": "2017-10-31 10:55:08.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "created_by": 1,
            "updated_at": {
                "date": "2018-09-20 09:18:58.000000",
                "timezone_type": 3,
                "timezone": "UTC"
            },
            "updated_by": 1,
            "location_id": "4",
            "date": "44-3-16",
            "type": "Battle"
        }
    ]
}
```


<a name="event"></a>
## Event

To get the details of a single event, use the following endpoint.

| Method | Endpoint| Headers |
| :- |   :-   |  :-  |
| GET/HEAD | `events/{event.id}` | Default |

### Results
```json
{
    "data": {
        "id": 1,
        "name": "Battle of Hadish",
        "entry": "\n<p>Lorem Ipsum.</p>\n",
        "image": "{path}",
        "image_full": "{url}",
        "image_thumb": "{url}",
        "is_private": true,
        "entity_id": 7,
        "tags": [],
        "created_at": {
            "date": "2017-10-31 10:55:08.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "created_by": 1,
        "updated_at": {
            "date": "2018-09-20 09:18:58.000000",
            "timezone_type": 3,
            "timezone": "UTC"
        },
        "updated_by": 1,
        "location_id": "4",
        "date": "44-3-16",
        "type": "Battle"
    }
    
}
```


<a name="create-event"></a>
## Create a Event

To create a event, use the following endpoint.

| Method | Endpoint| Headers |
| :- |   :-   |  :-  |
| POST | `events/` | Default |

### Body

| Parameter | Type | Detail |
| :- |   :-   |  :-  |
| `name` | `string` (Required) | Name of the event |
| `type` | `string` | The event's type |
| `date` | `string` | Fictional date at which the event took place |
| `location_id` | `string` | Location of the event |
| `tags` | `array` | Array of tag ids |
| `is_private` | `boolean` | If the event is only visible to `admin` members of the campaign |
| `image` | `stream` | Stream to file uploaded to the event |
| `image_url` | `string` | URL to a picture to be used for the event |

### Results

> {success} Code 200 with JSON body of the new event.


<a name="update-event"></a>
## Update a Event

To update a event, use the following endpoint.

| Method | Endpoint| Headers |
| :- |   :-   |  :-  |
| PUT/PATCH | `events/{event.id}` | Default |

### Body

The same body parameters are available as for when creating a event.

### Results

> {success} Code 200 with JSON body of the updated event.


<a name="delete-event"></a>
## Delete a Event

To delete a event, use the following endpoint.

| Method | Endpoint| Headers |
| :- |   :-   |  :-  |
| DELETE | `events/{event.id}` | Default |

### Results

> {success} Code 200 with JSON.