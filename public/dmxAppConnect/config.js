dmx.config({
  "apps": {
    "dluxGetBlog": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "number",
            "name": "id"
          },
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
                "name": "blog"
              },
              {
                "type": "object",
                "name": "comment",
                "sub": [
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
                        "type": "text",
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
                    "name": "percent_steem_dollars"
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
                ]
              },
              {
                "type": "number",
                "name": "entry_id"
              },
              {
                "type": "text",
                "name": "reblogged_on"
              }
            ]
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
            "name": "content-length"
          }
        ]
      }
    ],
    "app_detail": {
      "meta": [
        {
          "type": "text",
          "name": "blog"
        },
        {
          "type": "object",
          "name": "comment",
          "sub": [
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
                  "type": "text",
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
              "name": "percent_steem_dollars"
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
          ]
        },
        {
          "type": "number",
          "name": "entry_id"
        },
        {
          "type": "text",
          "name": "reblogged_on"
        }
      ],
      "outputType": "array"
    },
    "dluxPost": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "number",
            "name": "id"
          },
          {
            "type": "text",
            "name": "jsonrpc"
          },
          {
            "type": "object",
            "name": "result",
            "sub": [
              {
                "type": "number",
                "name": "abs_rshares"
              },
              {
                "type": "text",
                "name": "active"
              },
              {
                "type": "array",
                "name": "active_votes",
                "sub": [
                  {
                    "type": "number",
                    "name": "percent"
                  },
                  {
                    "type": "number",
                    "name": "reputation"
                  },
                  {
                    "type": "text",
                    "name": "rshares"
                  },
                  {
                    "type": "text",
                    "name": "time"
                  },
                  {
                    "type": "text",
                    "name": "voter"
                  },
                  {
                    "type": "number",
                    "name": "weight"
                  }
                ]
              },
              {
                "type": "boolean",
                "name": "allow_curation_rewards"
              },
              {
                "type": "boolean",
                "name": "allow_replies"
              },
              {
                "type": "boolean",
                "name": "allow_votes"
              },
              {
                "type": "text",
                "name": "author"
              },
              {
                "type": "text",
                "name": "author_reputation"
              },
              {
                "type": "number",
                "name": "author_rewards"
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
                "type": "number",
                "name": "children_abs_rshares"
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
                "type": "number",
                "name": "id"
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
                "type": "text",
                "name": "max_cashout_time"
              },
              {
                "type": "number",
                "name": "net_rshares"
              },
              {
                "type": "number",
                "name": "net_votes"
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
                "name": "percent_steem_dollars"
              },
              {
                "type": "text",
                "name": "permlink"
              },
              {
                "type": "text",
                "name": "promoted"
              },
              {
                "type": "array",
                "name": "reblogged_by"
              },
              {
                "type": "array",
                "name": "replies"
              },
              {
                "type": "number",
                "name": "reward_weight"
              },
              {
                "type": "text",
                "name": "root_author"
              },
              {
                "type": "text",
                "name": "root_permlink"
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
                "name": "total_pending_payout_value"
              },
              {
                "type": "number",
                "name": "total_vote_weight"
              },
              {
                "type": "text",
                "name": "url"
              },
              {
                "type": "number",
                "name": "vote_rshares"
              }
            ]
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
    "dluxGetPost": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "number",
            "name": "id"
          },
          {
            "type": "text",
            "name": "jsonrpc"
          },
          {
            "type": "object",
            "name": "result",
            "sub": [
              {
                "type": "number",
                "name": "abs_rshares"
              },
              {
                "type": "text",
                "name": "active"
              },
              {
                "type": "array",
                "name": "active_votes",
                "sub": [
                  {
                    "type": "number",
                    "name": "percent"
                  },
                  {
                    "type": "number",
                    "name": "reputation"
                  },
                  {
                    "type": "text",
                    "name": "rshares"
                  },
                  {
                    "type": "text",
                    "name": "time"
                  },
                  {
                    "type": "text",
                    "name": "voter"
                  },
                  {
                    "type": "number",
                    "name": "weight"
                  }
                ]
              },
              {
                "type": "boolean",
                "name": "allow_curation_rewards"
              },
              {
                "type": "boolean",
                "name": "allow_replies"
              },
              {
                "type": "boolean",
                "name": "allow_votes"
              },
              {
                "type": "text",
                "name": "author"
              },
              {
                "type": "text",
                "name": "author_reputation"
              },
              {
                "type": "number",
                "name": "author_rewards"
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
                "type": "number",
                "name": "children_abs_rshares"
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
                "type": "number",
                "name": "id"
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
                "type": "text",
                "name": "max_cashout_time"
              },
              {
                "type": "number",
                "name": "net_rshares"
              },
              {
                "type": "number",
                "name": "net_votes"
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
                "name": "percent_steem_dollars"
              },
              {
                "type": "text",
                "name": "permlink"
              },
              {
                "type": "text",
                "name": "promoted"
              },
              {
                "type": "array",
                "name": "reblogged_by"
              },
              {
                "type": "array",
                "name": "replies"
              },
              {
                "type": "number",
                "name": "reward_weight"
              },
              {
                "type": "text",
                "name": "root_author"
              },
              {
                "type": "text",
                "name": "root_permlink"
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
                "name": "total_pending_payout_value"
              },
              {
                "type": "number",
                "name": "total_vote_weight"
              },
              {
                "type": "text",
                "name": "url"
              },
              {
                "type": "number",
                "name": "vote_rshares"
              }
            ]
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
            "name": "content-length"
          }
        ]
      }
    ],
    "dluxGetContent": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "number",
            "name": "id"
          },
          {
            "type": "text",
            "name": "jsonrpc"
          },
          {
            "type": "object",
            "name": "result",
            "sub": [
              {
                "type": "number",
                "name": "abs_rshares"
              },
              {
                "type": "text",
                "name": "active"
              },
              {
                "type": "array",
                "name": "active_votes",
                "sub": [
                  {
                    "type": "number",
                    "name": "percent"
                  },
                  {
                    "type": "number",
                    "name": "reputation"
                  },
                  {
                    "type": "text",
                    "name": "rshares"
                  },
                  {
                    "type": "text",
                    "name": "time"
                  },
                  {
                    "type": "text",
                    "name": "voter"
                  },
                  {
                    "type": "number",
                    "name": "weight"
                  }
                ]
              },
              {
                "type": "boolean",
                "name": "allow_curation_rewards"
              },
              {
                "type": "boolean",
                "name": "allow_replies"
              },
              {
                "type": "boolean",
                "name": "allow_votes"
              },
              {
                "type": "text",
                "name": "author"
              },
              {
                "type": "text",
                "name": "author_reputation"
              },
              {
                "type": "number",
                "name": "author_rewards"
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
                "type": "number",
                "name": "children_abs_rshares"
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
                "type": "number",
                "name": "id"
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
                "type": "text",
                "name": "max_cashout_time"
              },
              {
                "type": "number",
                "name": "net_rshares"
              },
              {
                "type": "number",
                "name": "net_votes"
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
                "name": "percent_steem_dollars"
              },
              {
                "type": "text",
                "name": "permlink"
              },
              {
                "type": "text",
                "name": "promoted"
              },
              {
                "type": "array",
                "name": "reblogged_by"
              },
              {
                "type": "array",
                "name": "replies"
              },
              {
                "type": "number",
                "name": "reward_weight"
              },
              {
                "type": "text",
                "name": "root_author"
              },
              {
                "type": "text",
                "name": "root_permlink"
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
                "name": "total_pending_payout_value"
              },
              {
                "type": "number",
                "name": "total_vote_weight"
              },
              {
                "type": "text",
                "name": "url"
              },
              {
                "type": "number",
                "name": "vote_rshares"
              }
            ]
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
    ]
  },
  "detail": {
    "dluxGetBlog": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "number",
            "name": "id"
          },
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
                "name": "blog"
              },
              {
                "type": "object",
                "name": "comment",
                "sub": [
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
                        "type": "text",
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
                    "name": "percent_steem_dollars"
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
                ]
              },
              {
                "type": "number",
                "name": "entry_id"
              },
              {
                "type": "text",
                "name": "reblogged_on"
              }
            ]
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
            "name": "content-length"
          }
        ]
      }
    ],
    "repeat1": {
      "meta": [
        {
          "type": "text",
          "name": "blog"
        },
        {
          "type": "object",
          "name": "comment",
          "sub": [
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
                  "type": "text",
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
              "name": "percent_steem_dollars"
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
          ]
        },
        {
          "type": "number",
          "name": "entry_id"
        },
        {
          "type": "text",
          "name": "reblogged_on"
        }
      ],
      "outputType": "array"
    },
    "api1": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "number",
            "name": "id"
          },
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
                "name": "blog"
              },
              {
                "type": "object",
                "name": "comment",
                "sub": [
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
                        "type": "text",
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
                    "name": "percent_steem_dollars"
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
                ]
              },
              {
                "type": "number",
                "name": "entry_id"
              },
              {
                "type": "text",
                "name": "reblogged_on"
              }
            ]
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
            "name": "content-length"
          }
        ]
      }
    ],
    "data_detail1": {
      "meta": [
        {
          "type": "text",
          "name": "blog"
        },
        {
          "type": "object",
          "name": "comment",
          "sub": [
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
                  "type": "text",
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
              "name": "percent_steem_dollars"
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
          ]
        },
        {
          "type": "number",
          "name": "entry_id"
        },
        {
          "type": "text",
          "name": "reblogged_on"
        }
      ],
      "outputType": "array"
    }
  },
  "test": {
    "dluxPost": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "number",
            "name": "id"
          },
          {
            "type": "text",
            "name": "jsonrpc"
          },
          {
            "type": "object",
            "name": "result",
            "sub": [
              {
                "type": "number",
                "name": "abs_rshares"
              },
              {
                "type": "text",
                "name": "active"
              },
              {
                "type": "array",
                "name": "active_votes",
                "sub": [
                  {
                    "type": "number",
                    "name": "percent"
                  },
                  {
                    "type": "number",
                    "name": "reputation"
                  },
                  {
                    "type": "text",
                    "name": "rshares"
                  },
                  {
                    "type": "text",
                    "name": "time"
                  },
                  {
                    "type": "text",
                    "name": "voter"
                  },
                  {
                    "type": "number",
                    "name": "weight"
                  }
                ]
              },
              {
                "type": "boolean",
                "name": "allow_curation_rewards"
              },
              {
                "type": "boolean",
                "name": "allow_replies"
              },
              {
                "type": "boolean",
                "name": "allow_votes"
              },
              {
                "type": "text",
                "name": "author"
              },
              {
                "type": "text",
                "name": "author_reputation"
              },
              {
                "type": "number",
                "name": "author_rewards"
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
                "type": "number",
                "name": "children_abs_rshares"
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
                "type": "number",
                "name": "id"
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
                "type": "text",
                "name": "max_cashout_time"
              },
              {
                "type": "number",
                "name": "net_rshares"
              },
              {
                "type": "number",
                "name": "net_votes"
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
                "name": "percent_steem_dollars"
              },
              {
                "type": "text",
                "name": "permlink"
              },
              {
                "type": "text",
                "name": "promoted"
              },
              {
                "type": "array",
                "name": "reblogged_by"
              },
              {
                "type": "array",
                "name": "replies"
              },
              {
                "type": "number",
                "name": "reward_weight"
              },
              {
                "type": "text",
                "name": "root_author"
              },
              {
                "type": "text",
                "name": "root_permlink"
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
                "name": "total_pending_payout_value"
              },
              {
                "type": "number",
                "name": "total_vote_weight"
              },
              {
                "type": "text",
                "name": "url"
              },
              {
                "type": "number",
                "name": "vote_rshares"
              }
            ]
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
            "name": "content-length"
          }
        ]
      }
    ]
  }
});
