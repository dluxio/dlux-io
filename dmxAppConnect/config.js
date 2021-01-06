dmx.config({
  "index": {
    "blogResult": {
      "meta": [
        {
          "type": "text",
          "name": "author"
        },
        {
          "type": "text",
          "name": "permlink"
        },
        {
          "type": "text",
          "name": "category"
        },
        {
          "type": "text",
          "name": "title"
        },
        {
          "type": "text",
          "name": "body"
        },
        {
          "type": "text",
          "name": "json_metadata"
        },
        {
          "type": "text",
          "name": "created"
        },
        {
          "type": "text",
          "name": "last_update"
        },
        {
          "type": "number",
          "name": "depth"
        },
        {
          "type": "number",
          "name": "children"
        },
        {
          "type": "text",
          "name": "last_payout"
        },
        {
          "type": "text",
          "name": "cashout_time"
        },
        {
          "type": "text",
          "name": "total_payout_value"
        },
        {
          "type": "text",
          "name": "curator_payout_value"
        },
        {
          "type": "text",
          "name": "pending_payout_value"
        },
        {
          "type": "text",
          "name": "promoted"
        },
        {
          "type": "array",
          "name": "replies"
        },
        {
          "type": "number",
          "name": "body_length"
        },
        {
          "type": "number",
          "name": "author_reputation"
        },
        {
          "type": "text",
          "name": "parent_author"
        },
        {
          "type": "text",
          "name": "parent_permlink"
        },
        {
          "type": "text",
          "name": "url"
        },
        {
          "type": "text",
          "name": "root_title"
        },
        {
          "type": "array",
          "name": "beneficiaries"
        },
        {
          "type": "text",
          "name": "max_accepted_payout"
        },
        {
          "type": "number",
          "name": "percent_hbd"
        },
        {
          "type": "number",
          "name": "post_id"
        },
        {
          "type": "number",
          "name": "net_rshares"
        },
        {
          "type": "array",
          "name": "active_votes",
          "sub": [
            {
              "type": "text",
              "name": "percent"
            },
            {
              "type": "number",
              "name": "reputation"
            },
            {
              "type": "number",
              "name": "rshares"
            },
            {
              "type": "text",
              "name": "voter"
            }
          ]
        }
      ],
      "outputType": "array"
    },
    "dluxGetBlog": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "text",
            "name": "jsonrpc"
          },
          {
            "type": "array",
            "name": "result",
            "sub": [
              {
                "type": "text",
                "name": "author"
              },
              {
                "type": "text",
                "name": "permlink"
              },
              {
                "type": "text",
                "name": "category"
              },
              {
                "type": "text",
                "name": "title"
              },
              {
                "type": "text",
                "name": "body"
              },
              {
                "type": "text",
                "name": "json_metadata"
              },
              {
                "type": "text",
                "name": "created"
              },
              {
                "type": "text",
                "name": "last_update"
              },
              {
                "type": "number",
                "name": "depth"
              },
              {
                "type": "number",
                "name": "children"
              },
              {
                "type": "text",
                "name": "last_payout"
              },
              {
                "type": "text",
                "name": "cashout_time"
              },
              {
                "type": "text",
                "name": "total_payout_value"
              },
              {
                "type": "text",
                "name": "curator_payout_value"
              },
              {
                "type": "text",
                "name": "pending_payout_value"
              },
              {
                "type": "text",
                "name": "promoted"
              },
              {
                "type": "array",
                "name": "replies"
              },
              {
                "type": "number",
                "name": "body_length"
              },
              {
                "type": "number",
                "name": "author_reputation"
              },
              {
                "type": "text",
                "name": "parent_author"
              },
              {
                "type": "text",
                "name": "parent_permlink"
              },
              {
                "type": "text",
                "name": "url"
              },
              {
                "type": "text",
                "name": "root_title"
              },
              {
                "type": "array",
                "name": "beneficiaries"
              },
              {
                "type": "text",
                "name": "max_accepted_payout"
              },
              {
                "type": "number",
                "name": "percent_hbd"
              },
              {
                "type": "number",
                "name": "post_id"
              },
              {
                "type": "number",
                "name": "net_rshares"
              },
              {
                "type": "array",
                "name": "active_votes",
                "sub": [
                  {
                    "type": "text",
                    "name": "percent"
                  },
                  {
                    "type": "number",
                    "name": "reputation"
                  },
                  {
                    "type": "number",
                    "name": "rshares"
                  },
                  {
                    "type": "text",
                    "name": "voter"
                  }
                ]
              }
            ]
          },
          {
            "type": "number",
            "name": "id"
          }
        ]
      },
      {
        "type": "object",
        "name": "headers",
        "sub": [
          {
            "type": "text",
            "name": "date"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "connection"
          },
          {
            "type": "text",
            "name": "content-length"
          }
        ]
      }
    ],
    "data_detail1": {
      "meta": [
        {
          "type": "text",
          "name": "author"
        },
        {
          "type": "text",
          "name": "permlink"
        },
        {
          "type": "text",
          "name": "category"
        },
        {
          "type": "text",
          "name": "title"
        },
        {
          "type": "text",
          "name": "body"
        },
        {
          "type": "text",
          "name": "json_metadata"
        },
        {
          "type": "text",
          "name": "created"
        },
        {
          "type": "text",
          "name": "last_update"
        },
        {
          "type": "number",
          "name": "depth"
        },
        {
          "type": "number",
          "name": "children"
        },
        {
          "type": "text",
          "name": "last_payout"
        },
        {
          "type": "text",
          "name": "cashout_time"
        },
        {
          "type": "text",
          "name": "total_payout_value"
        },
        {
          "type": "text",
          "name": "curator_payout_value"
        },
        {
          "type": "text",
          "name": "pending_payout_value"
        },
        {
          "type": "text",
          "name": "promoted"
        },
        {
          "type": "array",
          "name": "replies"
        },
        {
          "type": "number",
          "name": "body_length"
        },
        {
          "type": "number",
          "name": "author_reputation"
        },
        {
          "type": "text",
          "name": "parent_author"
        },
        {
          "type": "text",
          "name": "parent_permlink"
        },
        {
          "type": "text",
          "name": "url"
        },
        {
          "type": "text",
          "name": "root_title"
        },
        {
          "type": "array",
          "name": "beneficiaries"
        },
        {
          "type": "text",
          "name": "max_accepted_payout"
        },
        {
          "type": "number",
          "name": "percent_hbd"
        },
        {
          "type": "number",
          "name": "post_id"
        },
        {
          "type": "number",
          "name": "net_rshares"
        },
        {
          "type": "array",
          "name": "active_votes",
          "sub": [
            {
              "type": "text",
              "name": "percent"
            },
            {
              "type": "number",
              "name": "reputation"
            },
            {
              "type": "number",
              "name": "rshares"
            },
            {
              "type": "text",
              "name": "voter"
            }
          ]
        }
      ],
      "outputType": "array"
    }
  },
  "apps": {
    "dluxGetBlog": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "object",
            "name": "error",
            "sub": [
              {
                "type": "number",
                "name": "code"
              },
              {
                "type": "text",
                "name": "data"
              },
              {
                "type": "text",
                "name": "message"
              }
            ]
          },
          {
            "type": "number",
            "name": "id"
          },
          {
            "type": "text",
            "name": "jsonrpc"
          }
        ]
      },
      {
        "type": "object",
        "name": "headers",
        "sub": [
          {
            "type": "text",
            "name": "date"
          },
          {
            "type": "text",
            "name": "via"
          },
          {
            "type": "text",
            "name": "server"
          },
          {
            "type": "text",
            "name": "x-powered-by"
          },
          {
            "type": "text",
            "name": "etag"
          },
          {
            "type": "text",
            "name": "content-type"
          },
          {
            "type": "text",
            "name": "access-control-allow-origin"
          },
          {
            "type": "text",
            "name": "connection"
          },
          {
            "type": "text",
            "name": "content-length"
          }
        ]
      }
    ],
    "blogResult": {
      "meta": [
        {
          "name": "$index",
          "type": "number"
        },
        {
          "name": "$key",
          "type": "text"
        },
        {
          "name": "$value",
          "type": "object"
        },
        {
          "type": "array",
          "name": "active_votes",
          "sub": [
            {
              "type": "text",
              "name": "percent"
            },
            {
              "type": "number",
              "name": "reputation"
            },
            {
              "type": "number",
              "name": "rshares"
            },
            {
              "type": "text",
              "name": "voter"
            }
          ]
        },
        {
          "type": "text",
          "name": "author"
        },
        {
          "type": "number",
          "name": "author_reputation"
        },
        {
          "type": "array",
          "name": "beneficiaries",
          "sub": [
            {
              "type": "text",
              "name": "account"
            },
            {
              "type": "number",
              "name": "weight"
            }
          ]
        },
        {
          "type": "text",
          "name": "body"
        },
        {
          "type": "number",
          "name": "body_length"
        },
        {
          "type": "text",
          "name": "cashout_time"
        },
        {
          "type": "text",
          "name": "category"
        },
        {
          "type": "number",
          "name": "children"
        },
        {
          "type": "text",
          "name": "created"
        },
        {
          "type": "text",
          "name": "curator_payout_value"
        },
        {
          "type": "number",
          "name": "depth"
        },
        {
          "type": "text",
          "name": "json_metadata"
        },
        {
          "type": "text",
          "name": "last_payout"
        },
        {
          "type": "text",
          "name": "last_update"
        },
        {
          "type": "text",
          "name": "max_accepted_payout"
        },
        {
          "type": "number",
          "name": "net_rshares"
        },
        {
          "type": "text",
          "name": "parent_author"
        },
        {
          "type": "text",
          "name": "parent_permlink"
        },
        {
          "type": "text",
          "name": "pending_payout_value"
        },
        {
          "type": "number",
          "name": "percent_hbd"
        },
        {
          "type": "text",
          "name": "permlink"
        },
        {
          "type": "number",
          "name": "post_id"
        },
        {
          "type": "text",
          "name": "promoted"
        },
        {
          "type": "array",
          "name": "replies"
        },
        {
          "type": "text",
          "name": "root_title"
        },
        {
          "type": "text",
          "name": "title"
        },
        {
          "type": "text",
          "name": "total_payout_value"
        },
        {
          "type": "text",
          "name": "url"
        }
      ],
      "outputType": "array"
    },
    "data_detail1": {
      "meta": [
        {
          "type": "array",
          "name": "active_votes",
          "sub": [
            {
              "type": "text",
              "name": "percent"
            },
            {
              "type": "number",
              "name": "reputation"
            },
            {
              "type": "number",
              "name": "rshares"
            },
            {
              "type": "text",
              "name": "voter"
            }
          ]
        },
        {
          "type": "text",
          "name": "author"
        },
        {
          "type": "number",
          "name": "author_reputation"
        },
        {
          "type": "array",
          "name": "beneficiaries",
          "sub": [
            {
              "type": "text",
              "name": "account"
            },
            {
              "type": "number",
              "name": "weight"
            }
          ]
        },
        {
          "type": "text",
          "name": "body"
        },
        {
          "type": "number",
          "name": "body_length"
        },
        {
          "type": "text",
          "name": "cashout_time"
        },
        {
          "type": "text",
          "name": "category"
        },
        {
          "type": "number",
          "name": "children"
        },
        {
          "type": "text",
          "name": "created"
        },
        {
          "type": "text",
          "name": "curator_payout_value"
        },
        {
          "type": "number",
          "name": "depth"
        },
        {
          "type": "text",
          "name": "json_metadata"
        },
        {
          "type": "text",
          "name": "last_payout"
        },
        {
          "type": "text",
          "name": "last_update"
        },
        {
          "type": "text",
          "name": "max_accepted_payout"
        },
        {
          "type": "number",
          "name": "net_rshares"
        },
        {
          "type": "text",
          "name": "parent_author"
        },
        {
          "type": "text",
          "name": "parent_permlink"
        },
        {
          "type": "text",
          "name": "pending_payout_value"
        },
        {
          "type": "number",
          "name": "percent_hbd"
        },
        {
          "type": "text",
          "name": "permlink"
        },
        {
          "type": "number",
          "name": "post_id"
        },
        {
          "type": "text",
          "name": "promoted"
        },
        {
          "type": "array",
          "name": "replies"
        },
        {
          "type": "text",
          "name": "root_title"
        },
        {
          "type": "text",
          "name": "title"
        },
        {
          "type": "text",
          "name": "total_payout_value"
        },
        {
          "type": "text",
          "name": "url"
        }
      ],
      "outputType": "array"
    },
    "data_detail": {
      "meta": [
        {
          "type": "array",
          "name": "active_votes",
          "sub": [
            {
              "type": "text",
              "name": "percent"
            },
            {
              "type": "number",
              "name": "reputation"
            },
            {
              "type": "number",
              "name": "rshares"
            },
            {
              "type": "text",
              "name": "voter"
            }
          ]
        },
        {
          "type": "text",
          "name": "author"
        },
        {
          "type": "number",
          "name": "author_reputation"
        },
        {
          "type": "array",
          "name": "beneficiaries",
          "sub": [
            {
              "type": "text",
              "name": "account"
            },
            {
              "type": "number",
              "name": "weight"
            }
          ]
        },
        {
          "type": "text",
          "name": "body"
        },
        {
          "type": "number",
          "name": "body_length"
        },
        {
          "type": "text",
          "name": "cashout_time"
        },
        {
          "type": "text",
          "name": "category"
        },
        {
          "type": "number",
          "name": "children"
        },
        {
          "type": "text",
          "name": "created"
        },
        {
          "type": "text",
          "name": "curator_payout_value"
        },
        {
          "type": "number",
          "name": "depth"
        },
        {
          "type": "text",
          "name": "json_metadata"
        },
        {
          "type": "text",
          "name": "last_payout"
        },
        {
          "type": "text",
          "name": "last_update"
        },
        {
          "type": "text",
          "name": "max_accepted_payout"
        },
        {
          "type": "number",
          "name": "net_rshares"
        },
        {
          "type": "text",
          "name": "parent_author"
        },
        {
          "type": "text",
          "name": "parent_permlink"
        },
        {
          "type": "text",
          "name": "pending_payout_value"
        },
        {
          "type": "number",
          "name": "percent_hbd"
        },
        {
          "type": "text",
          "name": "permlink"
        },
        {
          "type": "number",
          "name": "post_id"
        },
        {
          "type": "text",
          "name": "promoted"
        },
        {
          "type": "array",
          "name": "replies"
        },
        {
          "type": "text",
          "name": "root_title"
        },
        {
          "type": "text",
          "name": "title"
        },
        {
          "type": "text",
          "name": "total_payout_value"
        },
        {
          "type": "text",
          "name": "url"
        }
      ],
      "outputType": "array"
    }
  }
});
