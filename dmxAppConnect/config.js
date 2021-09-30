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
    },
    "sales": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "array",
            "name": "result",
            "sub": [
              {
                "type": "text",
                "name": "uid"
              },
              {
                "type": "text",
                "name": "set"
              },
              {
                "type": "object",
                "name": "price",
                "sub": [
                  {
                    "type": "number",
                    "name": "amount"
                  },
                  {
                    "type": "number",
                    "name": "precision"
                  },
                  {
                    "type": "text",
                    "name": "token"
                  }
                ]
              },
              {
                "type": "text",
                "name": "time"
              },
              {
                "type": "text",
                "name": "by"
              },
              {
                "type": "text",
                "name": "script"
              }
            ]
          },
          {
            "type": "array",
            "name": "mint",
            "sub": [
              {
                "type": "array",
                "name": "$value",
                "sub": [
                  {
                    "type": "text",
                    "name": "set"
                  },
                  {
                    "type": "array",
                    "name": "items",
                    "sub": [
                      {
                        "type": "object",
                        "name": "price",
                        "sub": [
                          {
                            "type": "number",
                            "name": "amount"
                          },
                          {
                            "type": "number",
                            "name": "precision"
                          },
                          {
                            "type": "text",
                            "name": "token"
                          }
                        ]
                      },
                      {
                        "type": "text",
                        "name": "time"
                      },
                      {
                        "type": "text",
                        "name": "by"
                      }
                    ]
                  },
                  {
                    "type": "text",
                    "name": "script"
                  }
                ]
              }
            ]
          },
          {
            "type": "text",
            "name": "node"
          },
          {
            "type": "text",
            "name": "VERSION"
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
    "data_view1": {
      "meta": [
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "object",
          "name": "price",
          "sub": [
            {
              "type": "number",
              "name": "amount"
            },
            {
              "type": "number",
              "name": "precision"
            },
            {
              "type": "text",
              "name": "token"
            }
          ]
        },
        {
          "type": "text",
          "name": "time"
        },
        {
          "type": "text",
          "name": "by"
        },
        {
          "type": "text",
          "name": "script"
        }
      ],
      "outputType": "array"
    },
    "salesMint": {
      "meta": [
        {
          "type": "array",
          "name": "$value",
          "sub": [
            {
              "type": "text",
              "name": "set"
            },
            {
              "type": "array",
              "name": "items",
              "sub": [
                {
                  "type": "object",
                  "name": "price",
                  "sub": [
                    {
                      "type": "number",
                      "name": "amount"
                    },
                    {
                      "type": "number",
                      "name": "precision"
                    },
                    {
                      "type": "text",
                      "name": "token"
                    }
                  ]
                },
                {
                  "type": "text",
                  "name": "time"
                },
                {
                  "type": "text",
                  "name": "by"
                }
              ]
            },
            {
              "type": "text",
              "name": "script"
            }
          ]
        }
      ],
      "outputType": "array"
    },
    "repeat1": {
      "meta": [
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "object",
          "name": "price",
          "sub": [
            {
              "type": "number",
              "name": "amount"
            },
            {
              "type": "number",
              "name": "precision"
            },
            {
              "type": "text",
              "name": "token"
            }
          ]
        },
        {
          "type": "text",
          "name": "time"
        },
        {
          "type": "text",
          "name": "by"
        },
        {
          "type": "text",
          "name": "script"
        }
      ],
      "outputType": "array"
    },
    "repeatmint": {
      "meta": [
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "array",
          "name": "items",
          "sub": [
            {
              "type": "object",
              "name": "price",
              "sub": [
                {
                  "type": "number",
                  "name": "amount"
                },
                {
                  "type": "number",
                  "name": "precision"
                },
                {
                  "type": "text",
                  "name": "token"
                }
              ]
            },
            {
              "type": "text",
              "name": "time"
            },
            {
              "type": "text",
              "name": "by"
            }
          ]
        },
        {
          "type": "text",
          "name": "script"
        }
      ],
      "outputType": "array"
    },
    "repeatmint1": {
      "meta": [
        {
          "type": "array",
          "name": "$value",
          "sub": [
            {
              "type": "text",
              "name": "set"
            },
            {
              "type": "array",
              "name": "items",
              "sub": [
                {
                  "type": "object",
                  "name": "price",
                  "sub": [
                    {
                      "type": "number",
                      "name": "amount"
                    },
                    {
                      "type": "number",
                      "name": "precision"
                    },
                    {
                      "type": "text",
                      "name": "token"
                    }
                  ]
                },
                {
                  "type": "text",
                  "name": "time"
                },
                {
                  "type": "text",
                  "name": "by"
                }
              ]
            },
            {
              "type": "text",
              "name": "script"
            }
          ]
        }
      ],
      "outputType": "array"
    },
    "repeatmint2": {
      "meta": [
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "array",
          "name": "items",
          "sub": [
            {
              "type": "object",
              "name": "price",
              "sub": [
                {
                  "type": "number",
                  "name": "amount"
                },
                {
                  "type": "number",
                  "name": "precision"
                },
                {
                  "type": "text",
                  "name": "token"
                }
              ]
            },
            {
              "type": "text",
              "name": "time"
            },
            {
              "type": "text",
              "name": "by"
            }
          ]
        },
        {
          "type": "text",
          "name": "script"
        }
      ],
      "outputType": "array"
    },
    "repeatmint3": {
      "meta": [
        {
          "type": "object",
          "name": "price",
          "sub": [
            {
              "type": "number",
              "name": "amount"
            },
            {
              "type": "number",
              "name": "precision"
            },
            {
              "type": "text",
              "name": "token"
            }
          ]
        },
        {
          "type": "text",
          "name": "time"
        },
        {
          "type": "text",
          "name": "by"
        }
      ],
      "outputType": "array"
    },
    "auctions": [
      {
        "type": "object",
        "name": "data",
        "sub": [
          {
            "type": "array",
            "name": "result",
            "sub": [
              {
                "type": "text",
                "name": "uid"
              },
              {
                "type": "text",
                "name": "set"
              },
              {
                "type": "object",
                "name": "price",
                "sub": [
                  {
                    "type": "number",
                    "name": "amount"
                  },
                  {
                    "type": "number",
                    "name": "precision"
                  },
                  {
                    "type": "text",
                    "name": "token"
                  }
                ]
              },
              {
                "type": "text",
                "name": "time"
              },
              {
                "type": "text",
                "name": "by"
              },
              {
                "type": "number",
                "name": "bids"
              },
              {
                "type": "text",
                "name": "bidder"
              },
              {
                "type": "text",
                "name": "script"
              }
            ]
          },
          {
            "type": "text",
            "name": "node"
          },
          {
            "type": "text",
            "name": "VERSION"
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
    "auctionsMint": {
      "meta": [
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "object",
          "name": "price",
          "sub": [
            {
              "type": "number",
              "name": "amount"
            },
            {
              "type": "number",
              "name": "precision"
            },
            {
              "type": "text",
              "name": "token"
            }
          ]
        },
        {
          "type": "text",
          "name": "time"
        },
        {
          "type": "text",
          "name": "by"
        },
        {
          "type": "number",
          "name": "bids"
        },
        {
          "type": "text",
          "name": "bidder"
        },
        {
          "type": "text",
          "name": "script"
        }
      ],
      "outputType": "array"
    },
    "auctionsToken": {
      "meta": [
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "object",
          "name": "price",
          "sub": [
            {
              "type": "number",
              "name": "amount"
            },
            {
              "type": "number",
              "name": "precision"
            },
            {
              "type": "text",
              "name": "token"
            }
          ]
        },
        {
          "type": "text",
          "name": "time"
        },
        {
          "type": "text",
          "name": "by"
        },
        {
          "type": "number",
          "name": "bids"
        },
        {
          "type": "text",
          "name": "bidder"
        },
        {
          "type": "text",
          "name": "script"
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
            "type": "text",
            "name": "jsonrpc"
          },
          {
            "type": "array",
            "name": "result",
            "sub": [
              {
                "type": "number",
                "name": "id"
              },
              {
                "type": "text",
                "name": "name"
              },
              {
                "type": "object",
                "name": "owner",
                "sub": [
                  {
                    "type": "number",
                    "name": "weight_threshold"
                  },
                  {
                    "type": "array",
                    "name": "account_auths"
                  },
                  {
                    "type": "array",
                    "name": "key_auths",
                    "sub": [
                      {
                        "type": "array",
                        "name": "$value",
                        "sub": [
                          {
                            "type": "text",
                            "name": "$value"
                          }
                        ]
                      }
                    ]
                  }
                ]
              },
              {
                "type": "object",
                "name": "active",
                "sub": [
                  {
                    "type": "number",
                    "name": "weight_threshold"
                  },
                  {
                    "type": "array",
                    "name": "account_auths"
                  },
                  {
                    "type": "array",
                    "name": "key_auths",
                    "sub": [
                      {
                        "type": "array",
                        "name": "$value",
                        "sub": [
                          {
                            "type": "text",
                            "name": "$value"
                          }
                        ]
                      }
                    ]
                  }
                ]
              },
              {
                "type": "object",
                "name": "posting",
                "sub": [
                  {
                    "type": "number",
                    "name": "weight_threshold"
                  },
                  {
                    "type": "array",
                    "name": "account_auths",
                    "sub": [
                      {
                        "type": "array",
                        "name": "$value",
                        "sub": [
                          {
                            "type": "text",
                            "name": "$value"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "type": "array",
                    "name": "key_auths",
                    "sub": [
                      {
                        "type": "array",
                        "name": "$value",
                        "sub": [
                          {
                            "type": "text",
                            "name": "$value"
                          }
                        ]
                      }
                    ]
                  }
                ]
              },
              {
                "type": "text",
                "name": "memo_key"
              },
              {
                "type": "text",
                "name": "json_metadata"
              },
              {
                "type": "text",
                "name": "posting_json_metadata"
              },
              {
                "type": "text",
                "name": "proxy"
              },
              {
                "type": "text",
                "name": "last_owner_update"
              },
              {
                "type": "text",
                "name": "last_account_update"
              },
              {
                "type": "text",
                "name": "created"
              },
              {
                "type": "boolean",
                "name": "mined"
              },
              {
                "type": "text",
                "name": "recovery_account"
              },
              {
                "type": "text",
                "name": "last_account_recovery"
              },
              {
                "type": "text",
                "name": "reset_account"
              },
              {
                "type": "number",
                "name": "comment_count"
              },
              {
                "type": "number",
                "name": "lifetime_vote_count"
              },
              {
                "type": "number",
                "name": "post_count"
              },
              {
                "type": "boolean",
                "name": "can_vote"
              },
              {
                "type": "object",
                "name": "voting_manabar",
                "sub": [
                  {
                    "type": "text",
                    "name": "current_mana"
                  },
                  {
                    "type": "number",
                    "name": "last_update_time"
                  }
                ]
              },
              {
                "type": "object",
                "name": "downvote_manabar",
                "sub": [
                  {
                    "type": "number",
                    "name": "current_mana"
                  },
                  {
                    "type": "number",
                    "name": "last_update_time"
                  }
                ]
              },
              {
                "type": "number",
                "name": "voting_power"
              },
              {
                "type": "text",
                "name": "balance"
              },
              {
                "type": "text",
                "name": "savings_balance"
              },
              {
                "type": "text",
                "name": "hbd_balance"
              },
              {
                "type": "text",
                "name": "hbd_seconds"
              },
              {
                "type": "text",
                "name": "hbd_seconds_last_update"
              },
              {
                "type": "text",
                "name": "hbd_last_interest_payment"
              },
              {
                "type": "text",
                "name": "savings_hbd_balance"
              },
              {
                "type": "text",
                "name": "savings_hbd_seconds"
              },
              {
                "type": "text",
                "name": "savings_hbd_seconds_last_update"
              },
              {
                "type": "text",
                "name": "savings_hbd_last_interest_payment"
              },
              {
                "type": "number",
                "name": "savings_withdraw_requests"
              },
              {
                "type": "text",
                "name": "reward_hbd_balance"
              },
              {
                "type": "text",
                "name": "reward_hive_balance"
              },
              {
                "type": "text",
                "name": "reward_vesting_balance"
              },
              {
                "type": "text",
                "name": "reward_vesting_hive"
              },
              {
                "type": "text",
                "name": "vesting_shares"
              },
              {
                "type": "text",
                "name": "delegated_vesting_shares"
              },
              {
                "type": "text",
                "name": "received_vesting_shares"
              },
              {
                "type": "text",
                "name": "vesting_withdraw_rate"
              },
              {
                "type": "text",
                "name": "post_voting_power"
              },
              {
                "type": "text",
                "name": "next_vesting_withdrawal"
              },
              {
                "type": "number",
                "name": "withdrawn"
              },
              {
                "type": "number",
                "name": "to_withdraw"
              },
              {
                "type": "number",
                "name": "withdraw_routes"
              },
              {
                "type": "number",
                "name": "pending_transfers"
              },
              {
                "type": "number",
                "name": "curation_rewards"
              },
              {
                "type": "number",
                "name": "posting_rewards"
              },
              {
                "type": "array",
                "name": "proxied_vsf_votes",
                "sub": [
                  {
                    "type": "number",
                    "name": "$value"
                  }
                ]
              },
              {
                "type": "number",
                "name": "witnesses_voted_for"
              },
              {
                "type": "text",
                "name": "last_post"
              },
              {
                "type": "text",
                "name": "last_root_post"
              },
              {
                "type": "text",
                "name": "last_vote_time"
              },
              {
                "type": "number",
                "name": "post_bandwidth"
              },
              {
                "type": "number",
                "name": "pending_claimed_accounts"
              },
              {
                "type": "array",
                "name": "delayed_votes"
              },
              {
                "type": "text",
                "name": "vesting_balance"
              },
              {
                "type": "number",
                "name": "reputation"
              },
              {
                "type": "array",
                "name": "transfer_history"
              },
              {
                "type": "array",
                "name": "market_history"
              },
              {
                "type": "array",
                "name": "post_history"
              },
              {
                "type": "array",
                "name": "vote_history"
              },
              {
                "type": "array",
                "name": "other_history"
              },
              {
                "type": "array",
                "name": "witness_votes"
              },
              {
                "type": "array",
                "name": "tags_usage"
              },
              {
                "type": "array",
                "name": "guest_bloggers"
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
    },
    "dluxGetAccount": [
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
                "type": "object",
                "name": "active",
                "sub": [
                  {
                    "type": "array",
                    "name": "account_auths"
                  },
                  {
                    "type": "array",
                    "name": "key_auths",
                    "sub": [
                      {
                        "type": "array",
                        "name": "$value",
                        "sub": [
                          {
                            "type": "text",
                            "name": "$value"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "type": "number",
                    "name": "weight_threshold"
                  }
                ]
              },
              {
                "type": "text",
                "name": "balance"
              },
              {
                "type": "boolean",
                "name": "can_vote"
              },
              {
                "type": "number",
                "name": "comment_count"
              },
              {
                "type": "text",
                "name": "created"
              },
              {
                "type": "number",
                "name": "curation_rewards"
              },
              {
                "type": "array",
                "name": "delayed_votes"
              },
              {
                "type": "text",
                "name": "delegated_vesting_shares"
              },
              {
                "type": "object",
                "name": "downvote_manabar",
                "sub": [
                  {
                    "type": "text",
                    "name": "current_mana"
                  },
                  {
                    "type": "number",
                    "name": "last_update_time"
                  }
                ]
              },
              {
                "type": "array",
                "name": "guest_bloggers"
              },
              {
                "type": "text",
                "name": "hbd_balance"
              },
              {
                "type": "text",
                "name": "hbd_last_interest_payment"
              },
              {
                "type": "text",
                "name": "hbd_seconds"
              },
              {
                "type": "text",
                "name": "hbd_seconds_last_update"
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
                "name": "last_account_recovery"
              },
              {
                "type": "text",
                "name": "last_account_update"
              },
              {
                "type": "text",
                "name": "last_owner_update"
              },
              {
                "type": "text",
                "name": "last_post"
              },
              {
                "type": "text",
                "name": "last_root_post"
              },
              {
                "type": "text",
                "name": "last_vote_time"
              },
              {
                "type": "number",
                "name": "lifetime_vote_count"
              },
              {
                "type": "array",
                "name": "market_history"
              },
              {
                "type": "text",
                "name": "memo_key"
              },
              {
                "type": "boolean",
                "name": "mined"
              },
              {
                "type": "text",
                "name": "name"
              },
              {
                "type": "text",
                "name": "next_vesting_withdrawal"
              },
              {
                "type": "array",
                "name": "other_history"
              },
              {
                "type": "object",
                "name": "owner",
                "sub": [
                  {
                    "type": "array",
                    "name": "account_auths"
                  },
                  {
                    "type": "array",
                    "name": "key_auths",
                    "sub": [
                      {
                        "type": "array",
                        "name": "$value",
                        "sub": [
                          {
                            "type": "text",
                            "name": "$value"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "type": "number",
                    "name": "weight_threshold"
                  }
                ]
              },
              {
                "type": "number",
                "name": "pending_claimed_accounts"
              },
              {
                "type": "number",
                "name": "pending_transfers"
              },
              {
                "type": "number",
                "name": "post_bandwidth"
              },
              {
                "type": "number",
                "name": "post_count"
              },
              {
                "type": "array",
                "name": "post_history"
              },
              {
                "type": "text",
                "name": "post_voting_power"
              },
              {
                "type": "object",
                "name": "posting",
                "sub": [
                  {
                    "type": "array",
                    "name": "account_auths",
                    "sub": [
                      {
                        "type": "array",
                        "name": "$value",
                        "sub": [
                          {
                            "type": "text",
                            "name": "$value"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "type": "array",
                    "name": "key_auths",
                    "sub": [
                      {
                        "type": "array",
                        "name": "$value",
                        "sub": [
                          {
                            "type": "text",
                            "name": "$value"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "type": "number",
                    "name": "weight_threshold"
                  }
                ]
              },
              {
                "type": "text",
                "name": "posting_json_metadata"
              },
              {
                "type": "number",
                "name": "posting_rewards"
              },
              {
                "type": "array",
                "name": "proxied_vsf_votes",
                "sub": [
                  {
                    "type": "number",
                    "name": "$value"
                  }
                ]
              },
              {
                "type": "text",
                "name": "proxy"
              },
              {
                "type": "text",
                "name": "received_vesting_shares"
              },
              {
                "type": "text",
                "name": "recovery_account"
              },
              {
                "type": "text",
                "name": "reputation"
              },
              {
                "type": "text",
                "name": "reset_account"
              },
              {
                "type": "text",
                "name": "reward_hbd_balance"
              },
              {
                "type": "text",
                "name": "reward_hive_balance"
              },
              {
                "type": "text",
                "name": "reward_vesting_balance"
              },
              {
                "type": "text",
                "name": "reward_vesting_hive"
              },
              {
                "type": "text",
                "name": "savings_balance"
              },
              {
                "type": "text",
                "name": "savings_hbd_balance"
              },
              {
                "type": "text",
                "name": "savings_hbd_last_interest_payment"
              },
              {
                "type": "text",
                "name": "savings_hbd_seconds"
              },
              {
                "type": "text",
                "name": "savings_hbd_seconds_last_update"
              },
              {
                "type": "number",
                "name": "savings_withdraw_requests"
              },
              {
                "type": "array",
                "name": "tags_usage"
              },
              {
                "type": "text",
                "name": "to_withdraw"
              },
              {
                "type": "array",
                "name": "transfer_history"
              },
              {
                "type": "text",
                "name": "vesting_balance"
              },
              {
                "type": "text",
                "name": "vesting_shares"
              },
              {
                "type": "text",
                "name": "vesting_withdraw_rate"
              },
              {
                "type": "array",
                "name": "vote_history"
              },
              {
                "type": "object",
                "name": "voting_manabar",
                "sub": [
                  {
                    "type": "text",
                    "name": "current_mana"
                  },
                  {
                    "type": "number",
                    "name": "last_update_time"
                  }
                ]
              },
              {
                "type": "number",
                "name": "voting_power"
              },
              {
                "type": "number",
                "name": "withdraw_routes"
              },
              {
                "type": "text",
                "name": "withdrawn"
              },
              {
                "type": "array",
                "name": "witness_votes",
                "sub": [
                  {
                    "type": "text",
                    "name": "$value"
                  }
                ]
              },
              {
                "type": "number",
                "name": "witnesses_voted_for"
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
    "inventorydata": [
      {
        "type": "array",
        "name": "data",
        "sub": [
          {
            "type": "text",
            "name": "uid"
          },
          {
            "type": "text",
            "name": "set"
          },
          {
            "type": "text",
            "name": "script"
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
    "iterator1": {
      "meta": null,
      "outputType": "object"
    },
    "inventory_iterator": {
      "meta": null,
      "outputType": "object"
    },
    "data_view1": {
      "meta": [
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "text",
          "name": "script"
        }
      ],
      "outputType": "array"
    },
    "repeat1": {
      "meta": null,
      "outputType": "array"
    },
    "repeat2": {
      "meta": [
        {
          "type": "text",
          "name": "uid"
        },
        {
          "type": "text",
          "name": "set"
        },
        {
          "type": "text",
          "name": "script"
        }
      ],
      "outputType": "array"
    }
  }
});
